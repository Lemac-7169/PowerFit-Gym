<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Importar

class Member extends Model
{
    use HasFactory, SoftDeletes; // Usar SoftDeletes

    protected $fillable = [
        'name', 'cedula', 'phone', 'membership_type', 'start_date', 'end_date', 'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
