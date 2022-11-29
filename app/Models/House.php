<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    public function category(){
        return $this -> belongsTo(Category::class,'_category_id','id');
    }
    public function province(){
        return  $this->belongsTo(Province::class,'_province_id','id');
    }
    public function district(){
        return  $this->belongsTo(District::class,'_district_id','id');
    }
    public function ward(){
        return  $this->belongsTo(Ward::class,'_ward_id','id');
    }
    public function street(){
        return  $this->belongsTo(Street::class,'_street_id','id');
    }
    public function user(){
        return  $this->belongsTo(User::class,'user_id','id');
    }
    public function likes(){
        return  $this->hasMany(Like::class,'house_id','id');
    }
}