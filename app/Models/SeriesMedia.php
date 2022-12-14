<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesMedia extends Model
{
    use HasFactory;

    protected $table = 'series_media';

    protected $fillable = [
        'series_id',
        'media_id',
        'hoseMaterial',
        'compatibility'
    ];

    public function series(){
        return $this->belongsTo(Series::class);

    }
}
