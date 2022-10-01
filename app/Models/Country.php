<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Get all of the hotels for the country.
     */
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
