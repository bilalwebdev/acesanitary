<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HoseSize;

class Accessories extends Model
{
    use HasFactory;

    protected $table = 'accessories';

    protected $fillable = [
        'part_number',
        'size',
        'price',
        'category'
    ];

}
