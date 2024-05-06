<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prize_user extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'prize_type',
        'prize_number',
        'assigned',
        'confirmed',
    ];
}
