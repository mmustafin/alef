<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorVisit extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorVisitFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'doctor_id',
        'weight',
        'temperature',
        'well_being',
        'disease_handbook_id',
        'disease_status'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
