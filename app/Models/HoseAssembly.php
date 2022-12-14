<?php

namespace App\Models;

use App\Models\Accessories\Collar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoseAssembly extends Model
{
    use HasFactory;

    protected $fillable = [
        'hose_id',
        'model',
        'collar_id',
        'min_length',
        'max_length',
        'step_up_1',
        'step_up_2',
        'end_style_1',
        'end_style_2',
        'connection_size_1',
        'connection_size_2',
    ];

    public function hose(){
        return $this->belongsTo(Hose::class);
    }


    public function collar(){
        return $this->belongsTo(Accessories::class);
    }

    public function endStyle()
    {
        return $this->belongsTo(EndStyle::class);
    }


}
