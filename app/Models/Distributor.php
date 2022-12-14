<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'distributors';

    protected $fillable = [
        'name',
        'email',
        'site_url',
        'phone',
        'address',
        'distributor_margin',
        'distributor_multiplier',
        'status'
    ];
}
