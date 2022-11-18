<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    public function categories(){
        return $this -> belongsTo(Category::class);
    }
    public function post(){
        return  $this->belongsTo(Post::class);
    }
    public function province(){
        return  $this->belongsTo(Province::class,'_province_id','id');
    }
}
