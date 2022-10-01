<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the faq.
     */

    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Author',
            
        ]);
    }

    public function faq_categories(){
        return $this->belongsToMany(FaqCategory::class)->withTimestamps();
    }
}