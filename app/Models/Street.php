<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function houses(){
        return $this -> hasMany(House::class,'_street_id','id');
    }
}
