<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndStyle extends Model
{
    use HasFactory;
    protected $table = 'end_styles';

    protected $fillable = [
        'name',
        'model',
        'part_number',
        'size',
        'step_up_supported',
        'price',
        'image'
    ];

    public function hoseSize()
    {
        return $this->belongsTo(HoseSize::class, 'size');
    }
}
