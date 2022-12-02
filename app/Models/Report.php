<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report_house';
    public $timestamps = false;
    public function house(){
        return  $this->hasMany(House::class,'house_id','id');
    }
    public function user(){
        return  $this->belongsTo(User::class,'user_id','id');
    }
}
