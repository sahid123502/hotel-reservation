<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create(['name' => 'Manajer Hotel', 'email' => 'manajer@hotel.test', 'password' => Hash::make('password123'), 'role' => 'manajer']);
        User::create(['name' => 'Resepsionis', 'email' => 'resepsionis@hotel.test', 'password' => Hash::make('password123'), 'role' => 'resepsionis']);
        Room::create(['room_number' => '101', 'type' => 'standar', 'price' => 250000, 'status' => 'tersedia', 'facilities' => 'Kasur, AC, WiFi']);
    }
}
