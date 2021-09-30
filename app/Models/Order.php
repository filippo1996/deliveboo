<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'lastname',
        'email',
        'price',
        'phone_number',
        'address',
        'house_number',
        'postal_code',
        'city',
        'country'
    ];
}
