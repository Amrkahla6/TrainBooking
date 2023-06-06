<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    public function getData()
    {
        $reservations = Reservation::with('user')
                        ->select(['current_station', 'destination_station', 'number_of_stations', 'price', 'user_id']);

        return DataTables::of($reservations)->make(true);
    }
}
