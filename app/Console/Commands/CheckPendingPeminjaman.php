<?php

namespace App\Console\Commands;

use App\Models\Pinjaman;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckPendingPeminjaman extends Command
{

    protected $signature = 'check:pending-peminjaman';
    protected $description = 'Check pending peminjaman and mark as failed if past deadline';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $pendingPeminjaman = Pinjaman::where('status', 'Pending')
            ->where('confirmation_deadline', '<', Carbon::now())
            ->get();
        foreach ($pendingPeminjaman as $peminjaman) {
            $peminjaman->status = 'Gagal';
            $peminjaman->save();
        }

        $this->info('Pending peminjaman checked successfully.');
    }
}
