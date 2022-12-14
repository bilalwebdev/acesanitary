<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToleranceMessaging extends Model
{
    use HasFactory;

    protected $table = "tolerance_messages";

    protected $fillable = ['message'];

}
