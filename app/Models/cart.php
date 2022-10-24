<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded=[
        'id',
    ];

    function product(){
        return $this->belongsTo(product::class,'productId');
    }
    function user(){
        return $this->belongsTo(user::class,'userId');
    }
}
