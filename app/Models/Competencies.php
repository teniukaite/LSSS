<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Competencies extends Model
{
    use HasFactory, Notifiable;
    protected $table='competencies';
    protected $fillable = [
        'freelancerID',
        'education',
        'categories',
        'description',
    ];
}