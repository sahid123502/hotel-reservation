<?php
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\CancelExpiredReservations;

Schedule::command(CancelExpiredReservations::class)->hourly();
