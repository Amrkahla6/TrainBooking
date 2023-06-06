<?php


namespace App\Repositories;


use App\Events\ReservationMade;
use App\Models\Reservation;
use App\Repositories\Interfaces\ReservationRepositoryInterface;
use Carbon\Carbon;

class ReservationRepository implements ReservationRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Reservation();
    }//End __construct Function


    /**
     * @param $data
     * Store reservation data
     * Send real-time event if more than three reservations in one day
     */
    public function store($data)
    {

        // TODO: Implement store() method.

        //Validate Price
        $price = $this->validatePrice($data['number_of_stations']);


        //Store New Reservation
        $reservation = $this->model::create([
            'user_id'             => auth()->user()->id,
            'current_station'     => $data['current_station'],
            'destination_station' => $data['destination_station'],
            'number_of_stations'  => $data['number_of_stations'],
            'price'               => $price,
        ]);

        //Number of reservations today
        $reservationsCount = $this->reservationsCount();

        //Send event if reservation more than 3
        if ($reservationsCount > 3) {
            event(new ReservationMade($reservation->load('user'),$reservationsCount));
        }

    }//end store function

    /**
     * Validate price
     * @param $numberOfStations
     * @return int
     */
    public function validatePrice($numberOfStations) : int
    {
         $price = 0;

        if ($numberOfStations >= 1 && $numberOfStations <= 7) {
            $price = 5;
        } elseif ($numberOfStations >= 8 && $numberOfStations <= 12) {
            $price = 10;
        } elseif ($numberOfStations >= 13) {
            $price = 20;
        }

        return $price;
    }//end validate price function

    /**
     * @return int
     * Count reservation for auth user today
     */
    public function reservationsCount() : int
    {
        return  Reservation::where('user_id',auth()->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->count();
    }//end reservations count function
}
