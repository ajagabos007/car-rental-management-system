<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    /**
     * Get all of the flights that are assigned this tag.
     */
    public function flights()
    {
        return $this->morphedByMany(Post::class, 'amenitable');
    }
 
    /**
     * Get all of the hotels that are assigned this tag.
     */
    public function hotels()
    {
        return $this->morphedByMany(Video::class, 'amenitable');
    }
}
