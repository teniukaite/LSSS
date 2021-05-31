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
        'status',
        'project_name',
        'client_id',
        'fk_service_id',
        'price',
        'price_content',
        'fk_client_id',
        'fk_freelancer_id',
        'fk_review_id',
        'time_id',
        'description',
    ];
}
