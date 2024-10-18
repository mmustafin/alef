<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseHandbook extends Model
{
    /** @use HasFactory<\Database\Factories\DiseaseHandbookFactory> */
    use HasFactory;

    protected $fillable = [
        'title'
    ];
}
