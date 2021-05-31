<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'id',
        'rating',
        'text',
        'fk_offer_id',
        'fk_client_id',
        'fk_project_id',
        'fk_freelancer_id',
    ];
//    public $timestamps = false;

    public function offer()
    {
        return $this->belongsTo(Offers::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
