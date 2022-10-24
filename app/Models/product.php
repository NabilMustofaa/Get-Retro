<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded=[
        'id',
    ];
    protected $attributes = [
        'image' => '',
    ];
    function category(){
        return $this->belongsTo(category::class,'categoryId');
    }
    function brand(){
        return $this->belongsTo(brand::class,'brandId');
    }
}
