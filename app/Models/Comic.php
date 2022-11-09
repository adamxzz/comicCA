<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
//comic model class handles all the data used in a web application
{
    use HasFactory;
    protected $fillable = ['title','description','genre','author','illustrator','issues'];
    //protected by $guarded = [];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
