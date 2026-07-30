<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Reservation;
use Carbon\Carbon;

class CancelExpiredReservations extends Command
{
    protected $signature = 'reservation:batal-kadaluarsa';
    protected $description = 'Batalkan reservasi belum dibayar lewat 24 jam';

    public function handle()
    {
        $batas = Carbon::now()->subHours(24);
        Reservation::where('status', Reservation::STATUS_PENDING)
            ->where('created_at', '<', $batas)
            ->update(['status' => Reservation::STATUS_CANCELLED]);
        $this->info('Reservasi kadaluarsa sudah dibatalkan.');
        return Command::SUCCESS;
    }
}
