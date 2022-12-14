<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hose extends Model
{
    use HasFactory;

    protected $table = 'hoses';
    protected $fillable = [
        'model',
        'part_number',
        'name',
        'series_id',
        'material_id',
        'inner_diameter',
        'outer_diameter',
        'app_type',
        'min_cleaning_temprature',
        'max_cleaning_temprature',
        'min_process_temprature',
        'max_process_temprature',
        'min_cleaning_pressure',
        'max_cleaning_pressure',
        'min_process_pressure',
        'max_process_pressure',
        'deration',
        'max_supported_pressure',
        'price',
        'full_coil_oal',
        'description',
        'factory_assembly',
        'unit_of_measure',
        'image',
        'requirments',
        'end_style_1',
        'end_style_2',
        'collar_id',
        'connection_size_1',
        'connection_size_2',
        'max_length',
        'regulations'

    ];

    public function material()
    {

        return $this->belongsTo(Material::class);
    }

    public function series()
    {

        return $this->belongsTo(Series::class);
    }

    public function collar()
    {
        return $this->belongsTo(Accessories::class, 'collar_id');
    }

    public static function boot()
    {
        parent::boot();

        self::deleted(function ($model) {
            HoseAssembly::where('hose_id', $model->id)->delete();
        });
    }
}
