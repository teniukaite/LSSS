<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'id',
        'client_id',
        'fk_service_id',
        'price',
        'fk_client_id',
        'fk_freelancer_id',
        'fk_review_id',
        'description',
    ];
}
