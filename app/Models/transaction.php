<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $guarded=[
        'id',
    ];

    function product(){
        return $this->belongsTo(product::class,'productId');
    }
    function user(){
        return $this->belongsTo(user::class,'userId');
    }
    use HasFactory;
}
