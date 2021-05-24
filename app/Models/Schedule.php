<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'id',
        'date',
        'time',
        'status',
        'offer_id',
        'fk_client_id',
        'fk_freelancer_id',
    ];

}
