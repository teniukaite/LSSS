<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Categories extends Model
{
    use HasFactory, Notifiable;
    protected $table='categories';
    protected $fillable = [
        'id',
        'name',
    ];
}
