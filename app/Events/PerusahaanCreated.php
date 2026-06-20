<?php

namespace App\Events;

use App\Models\Perusahaan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PerusahaanCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Perusahaan $perusahaan) {}

    public function broadcastOn(): array
    {
        return [new Channel('perusahaan')];
    }

    public function broadcastAs(): string
    {
        return 'perusahaan.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id'               => $this->perusahaan->id,
            'nama'             => $this->perusahaan->nama,
            'lokasi'           => $this->perusahaan->lokasi,
            'jenis_kegiatan'   => $this->perusahaan->jenis_kegiatan,
            'tentang'          => $this->perusahaan->tentang,
            'jumlah_mahasiswa' => $this->perusahaan->jumlah_mahasiswa,
            'url'              => route('perusahaan.detail', $this->perusahaan->id),
        ];
    }
}
