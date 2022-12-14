<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoseSize extends Model
{
    use HasFactory;

    protected $table  = "hose_sizes";

    protected $fillable = ['size'];
}
