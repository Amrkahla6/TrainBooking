<?php


namespace App\Repositories;


use App\Models\Reservation;
use App\Repositories\Interfaces\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Reservation();
    }//End __construct Function


    public function store($data)
    {

        // TODO: Implement store() method.

        $price = $this->validatePrice($data['number_of_stations']);

        $this->model::create([
            'user_id'             => auth()->user()->id,
            'current_station'     => $data['current_station'],
            'destination_station' => $data['destination_station'],
            'number_of_stations'  => $data['number_of_stations'],
            'price'               => $price,
        ]);
    }

    /**
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
    }
}
