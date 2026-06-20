<?php

namespace App\Events;

use App\Models\FinalProject;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FinalProjectCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public FinalProject $project) {}

    public function broadcastOn(): array
    {
        return [new Channel('final-project')];
    }

    public function broadcastAs(): string
    {
        return 'finalproject.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id'           => $this->project->id,
            'user_id'      => $this->project->user_id,
            'title'        => $this->project->title,
            'abstract'     => $this->project->abstract ?? null,
            'status'       => $this->project->status,
            'submitted_at' => $this->project->submitted_at,
            'student_name' => $this->project->student->nama_lengkap ?? 'N/A',
            'student_nim'  => $this->project->student->nim ?? 'N/A',
        ];
    }
}
