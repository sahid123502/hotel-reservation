<?php
namespace App\Services;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationService
{
    public function create(array $validated): Reservation
    {
        return DB::transaction(function () use ($validated) {
            $room = Room::findOrFail($validated['room_id']);
            $ada = Reservation::where('room_id', $room->id)
                ->whereIn('status', [Reservation::STATUS_PENDING, Reservation::STATUS_APPROVED])
                ->where('check_in_date', '<=', $validated['check_out_date'])
                ->where('check_out_date', '>=', $validated['check_in_date'])
                ->exists();
            if ($ada) throw new \Exception('Kamar sudah dipesan');

            $mulai = Carbon::parse($validated['check_in_date']);
            $selesai = Carbon::parse($validated['check_out_date']);
            $jumlahHari = max(1, $mulai->diffInDays($selesai));
            $total = $room->price * $jumlahHari;

            return Reservation::create([
                'user_id' => auth()->id(),
                'room_id' => $room->id,
                'check_in_date' => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'total_price' => $total,
                'status' => Reservation::STATUS_PENDING
            ]);
        });
    }
}
