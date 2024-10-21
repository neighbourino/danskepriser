<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'quantity_unit' => 'array',
        'quantity_pieces' => 'array',
        'quantity_size' => 'array',
    ];
}
