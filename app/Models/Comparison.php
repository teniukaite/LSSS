<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;
    protected $table = 'comparison';
    protected $fillable = [
        'id',
        'clientId',
        'offerId',
    ];
    public function offer()
    {
        return $this->belongsTo(Offers::class);
    }
}
