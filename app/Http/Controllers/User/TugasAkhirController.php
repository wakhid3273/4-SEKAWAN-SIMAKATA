<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use App\Events\FinalProjectCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasAkhirController extends Controller
{
    // Show form input judul TA
    public function create()
    {
        $user = Auth::user();
        
        return view('user.tugas-akhir.create', compact('user'));
    }

    // Store judul TA baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
        ]);

        // Create pengajuan TA
        $finalProject = FinalProject::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'submitted_at' => now(),
            'status' => 'pending', // Standardized
        ]);

        // Broadcast event (graceful failure)
        try {
            broadcast(new FinalProjectCreated($finalProject));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting FinalProjectCreated failed: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')
            ->with('success', 'Judul Tugas Akhir berhasil disubmit!');
    }

    // Show edit form (hanya jika approved atau rejected)
    public function edit($id)
    {
        $finalProject = FinalProject::where('user_id', Auth::id())->findOrFail($id);
        
        // Hanya bisa edit jika status approved atau rejected
        if ($finalProject->status === 'pending') {
            return redirect()->route('user.dashboard')
                ->with('error', 'Judul TA masih dalam review, tidak dapat diubah.');
        }
        
        $user = Auth::user();
        
        return view('user.tugas-akhir.edit', compact('finalProject', 'user'));
    }

    // Update judul TA yang sudah approved/rejected
    public function update(Request $request, $id)
    {
        $finalProject = FinalProject::where('user_id', Auth::id())->findOrFail($id);
        
        // Hanya bisa edit jika status approved atau rejected
        if ($finalProject->status === 'pending') {
            return redirect()->route('user.dashboard')
                ->with('error', 'Judul TA masih dalam review, tidak dapat diubah.');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:500',
        ]);

        // Update fields
        $finalProject->title = $validated['title'];
        
        // Reset status to pending after update (submit ulang untuk review)
        $finalProject->status = 'pending';
        $finalProject->submitted_at = now();
        $finalProject->save();

        // Broadcast event
        try {
            broadcast(new \App\Events\FinalProjectUpdated($finalProject));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting FinalProjectUpdated failed: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')
            ->with('success', 'Judul Tugas Akhir berhasil diupdate dan akan direview kembali!');
    }
}
