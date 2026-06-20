<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PerusahaanDeleted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public int $id) {}

    public function broadcastOn(): array
    {
        return [new Channel('perusahaan')];
    }

    public function broadcastAs(): string
    {
        return 'perusahaan.deleted';
    }

    public function broadcastWith(): array
    {
        return ['id' => $this->id];
    }
}
