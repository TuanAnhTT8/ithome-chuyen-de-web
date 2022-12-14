<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public function wards(){
        return $this -> hasMany(Ward::class);
    }
    public function streets(){
        return $this -> hasMany(Street::class);
    }
    public function houses(){
        return $this -> hasMany(House::class,'_district_id','id');
    }
}
