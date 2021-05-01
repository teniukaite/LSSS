<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'id',
        'service_name',
        'description',
        'price',
        'registration_times',
        'city',
        'category',
        'freelancerId'
    ];

}
