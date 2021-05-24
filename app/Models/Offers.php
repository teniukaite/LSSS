<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offers extends Model
//    implements Searchable
{

    protected $fillable = [
        'id',
        'service_name',
        'description',
        'price',
        'price_content',
        'duration',
        'city',
        'category',
        'freelancerId',
        'photo',
         'file_name',
        'file_path',
    ];
}
