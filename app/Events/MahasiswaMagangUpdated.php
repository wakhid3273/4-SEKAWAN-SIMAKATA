<?php

namespace App\Events;

use App\Models\MahasiswaMagang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MahasiswaMagangUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public MahasiswaMagang $mahasiswa) {}

    public function broadcastOn(): array
    {
        return [new Channel('mahasiswa-magang')];
    }

    public function broadcastAs(): string
    {
        return 'mahasiswa.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->mahasiswa->id,
            'user_id' => $this->mahasiswa->user_id,
            'perusahaan_id' => $this->mahasiswa->perusahaan_id,
            'nim' => $this->mahasiswa->nim,
            'nama' => $this->mahasiswa->nama,
            'program_studi' => $this->mahasiswa->program_studi,
            'judul_ta' => $this->mahasiswa->judul_ta,
            'pembimbing_1' => $this->mahasiswa->pembimbing_1,
            'pembimbing_2' => $this->mahasiswa->pembimbing_2,
            'status' => $this->mahasiswa->status,
            'tanggal_mulai' => $this->mahasiswa->tanggal_mulai,
            'tanggal_selesai' => $this->mahasiswa->tanggal_selesai,
        ];
    }
}
