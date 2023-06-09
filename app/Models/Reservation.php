<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'current_station',
        'destination_station',
        'number_of_stations',
        'price',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
