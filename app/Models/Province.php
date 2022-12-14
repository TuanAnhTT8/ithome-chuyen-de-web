<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public function districts(){
        return $this -> hasMany(District::class);
    }
    public function wards(){
        return $this -> hasMany(Ward::class);
    }
    public function houses(){
        return $this -> hasMany(House::class,'_province_id','id');
    }
}
