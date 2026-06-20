<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MahasiswaDataUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param User   $mahasiswa  Model user yang diubah
     * @param string $action     'created' | 'updated' | 'deleted'
     */
    public function __construct(public User $mahasiswa, public string $action = 'updated') {}

    public function broadcastOn(): array
    {
        return [new Channel('mahasiswa-data')];
    }

    public function broadcastAs(): string
    {
        return 'mahasiswa.data.' . $this->action;
    }

    public function broadcastWith(): array
    {
        return [
            'id'             => $this->mahasiswa->id,
            'nim'            => $this->mahasiswa->nim,
            'nama_lengkap'   => $this->mahasiswa->nama_lengkap,
            'email'          => $this->mahasiswa->email,
            'angkatan'       => $this->mahasiswa->angkatan,
            'program_studi'  => $this->mahasiswa->program_studi,
            'semester_aktif' => $this->mahasiswa->semester_aktif,
            'status_akademik'=> $this->mahasiswa->status_akademik,
            'action'         => $this->action,
        ];
    }
}
