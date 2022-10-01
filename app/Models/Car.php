<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'rental_company',
        'car_type_id',
        'no_of_passenger',
        'no_of_baggage',
        'car_type_id',
        'rental_information',
        'price',
    ]; 

    public function type(){
        return $this->belongsTo(CarType::class, 'car_type_id');
    }

    /**
     * Get the car's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get all of the amenities for the flight.
     */
    public function amenities()
    {
        return $this->morphToMany(Amenity::class, 'amenitable');
    }

    /**
     * Get the car's booking.
     */
    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

}
