<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreReservation;
use App\Repositories\Interfaces\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private $authRepository;

    public function __construct(ReservationRepositoryInterface $modelRepository)
    {
        $this->authRepository = $modelRepository;
    }

    public function store(StoreReservation $request)
    {
        try {
            $data = $request->only(['current_station', 'destination_station', 'number_of_stations', 'price']);

            // Save the form data using the repository
            $this->authRepository->store($data);

            return redirect()->route('home')
                ->with('success','Reservation stored successfully');

        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('home')->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }

    }//end store function

}
