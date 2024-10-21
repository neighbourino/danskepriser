<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
