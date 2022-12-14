<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'qty',
        'unit_price',
        'unit_of_measure',
        'description',
        'bulk_price',
        'bulk_unit_of_measure',
        'coil_length',
        'assembly_charge',
        'factory_assembly',
        'net_price',
    ];
}
