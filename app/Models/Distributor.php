<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'biography'];

    // returns the distributors comics
    // distributors -> comics
    public function comics()
    {
        return $this->hasMany(Comic::class);
    }

    
}
