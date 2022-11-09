<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    use HasFactory;

    // returns the distributors comics
    // distributors -> comics
    public function books()
    {
        return $this->hasMany(Comic::class);
    }

    
}
