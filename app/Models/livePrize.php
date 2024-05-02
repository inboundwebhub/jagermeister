<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivePrize extends Model
{
    use HasFactory;

    protected $fillable = [
        'prize_id',
        'prize_number',
        'prize_type',

    ];

    public function prize()
    {
        return $this->belongsTo(Prize::class, 'prize_id');
    }
}
