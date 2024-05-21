<?php

use Carbon\Carbon;
use App\Models\Pinjaman;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('check:pending-peminjaman', function () {
    $pendingPeminjaman = Pinjaman::where('status', 'Pending')
        ->where('confirmation_deadline', '<', Carbon::now())
        ->get();
    foreach ($pendingPeminjaman as $peminjaman) {
        $peminjaman->status = 'Gagal';
        $peminjaman->save();
    }

    $this->info('Pending peminjaman checked successfully.');
})->purpose('Check pending peminjaman and mark as failed if past deadline');
