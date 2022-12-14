<?php

namespace App\Models\Accessories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\HoseSize;
use Illuminate\Database\Eloquent\Model;

class BSNut extends Model
{
    use HasFactory;
    protected $table = "b_s_nuts";
    protected $fillable = [
        'part_number',
        'size',
        'price'
    ];

    public function hoseSize()
    {
        return $this->belongsTo(HoseSize::class, 'size');
    }
}
