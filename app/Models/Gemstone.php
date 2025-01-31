<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gemstone extends Model
{
    use HasFactory;

    public function categoty(){
        return $this->belongsTo(Category::class);
    }
}
