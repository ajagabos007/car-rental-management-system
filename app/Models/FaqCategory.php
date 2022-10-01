<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modesl\Faq;

class FaqCategory extends Model
{
    use HasFactory;

    public function faqs(){
        return $this->belongsToMany(Faq::class)->withTimestamps();
    }
}
