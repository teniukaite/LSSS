<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conflicts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'applicantId',
        'accusedId',
        'applicantInfo',
        'additionalFilesApplicant',
        'additionalFilesAccused',
        'state'
    ];
}
