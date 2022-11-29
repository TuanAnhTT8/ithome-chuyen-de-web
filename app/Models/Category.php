<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function houses(){
        return $this->hasMany(House::class,'_category_id','id');
    }
    public $timestamps = false;
}
