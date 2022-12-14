<?php

namespace App\Http\Livewire\Hoses;

use App\Models\Accessories;
use App\Models\ApplicationType;
use App\Models\EndStyle;
use App\Models\Hose;
use App\Models\HoseSize;
use App\Models\Material;
use App\Models\Models;
use App\Models\Regulations;
use App\Models\Series;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $module_name = "hoses";

    public $image;
    public $sizes;
    public $model;
    public $part_number;
    public $name;
    public $series_id;
    public $material_id;
    public $inner_diameter;
    public $outer_diameter;
    public $application_type;
    public $min_cleaning_temprature;
    public $max_cleaning_temprature;
    public $min_process_temprature;
    public $max_process_temprature;
    public $min_cleaning_pressure;
    public $max_cleaning_pressure;
    public $min_process_pressure;
    public $max_process_pressure;
    public $deration;
    public $max_length;
    public $price;
    public $full_coil_oal;
    public $description;
    public $factory_assembly = 0;
    public $unit_of_measure;
    public $materials;
    public $series;
    public $requirments = [];
    public $endstyle1 = [];
    public $endstyle2 = [];
    public $connection_size_1 = [];
    public $connection_size_2 = [];
    public $collar_id;
    public $app_types;
    public $errors;
    public $regulations = [];
    public $isUploaded;




    protected $rules = [
        'model' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        'part_number' => 'required|unique:hoses,part_number',
        'name' => 'required',
        'series_id' => 'required',
        'material_id' => 'required',
        'inner_diameter' => 'required|regex:/[^A-Za-z][1-9]*\-?[1-9]*[\/]?[1-9]*/',
        'application_type' => 'required',
        'min_cleaning_temprature' => 'required|numeric',
        'max_cleaning_temprature' => 'required|numeric',
        'min_process_temprature' => 'required|numeric',
        'max_process_temprature' => 'required|numeric',
        'min_cleaning_pressure' => 'required|numeric',
        'max_cleaning_pressure' => 'required|numeric',
        'min_process_pressure' => 'required|numeric',
        'max_process_pressure' => 'required|numeric',
        'deration' => 'required|numeric',
        'price' => 'required|numeric',
        'full_coil_oal' => 'required',
        'description' => 'required',
        'unit_of_measure' => 'required',
        'max_length' => 'required|numeric',
        'endstyle1' => 'required',
        'endstyle2' => 'required',
        'connection_size_1' => 'required',
        'connection_size_2' => 'required',
        'regulations' => 'required'

    ];

    public function updatedImage()
    {
        $this->validate(['image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',]);
        $this->isUploaded = 1;
    }

    //$this->errors = $this->getErrorBag();

    public function mount()
    {

        $this->materials = Material::all();
        $this->series = Series::all();
        $this->sizes = HoseSize::all();
        $this->allRegulations =  Regulations::all();
        $this->app_types = ApplicationType::all();
        $this->models = Models::all();
        $this->collars = Accessories::where('category', 'Collar')->get();
        $this->end_styles = EndStyle::all();
    }


    public function store()
    {
        $this->validate();

        $hose = Hose::create([
            'model' => $this->model,
            'part_number' => $this->part_number,
            'name' => $this->name,
            'series_id' => $this->series_id,
            'material_id' => $this->material_id,
            'inner_diameter' => $this->inner_diameter,
            'outer_diameter' => $this->outer_diameter,
            'app_type' => $this->application_type,
            'deration' => $this->deration,
            'price' => $this->price,
            'full_coil_oal' => $this->full_coil_oal,
            'unit_of_measure' => $this->unit_of_measure,
            'description' => $this->description,
            'min_cleaning_temprature' => $this->min_cleaning_temprature,
            'max_cleaning_temprature' => $this->max_cleaning_temprature,
            'min_process_temprature' => $this->min_process_temprature,
            'max_process_temprature' => $this->max_process_temprature,
            'min_cleaning_pressure' => $this->min_cleaning_pressure,
            'max_cleaning_pressure' => $this->max_cleaning_pressure,
            'min_process_pressure' => $this->min_process_pressure,
            'max_process_pressure' => $this->max_process_pressure,
            'factory_assembly' => $this->factory_assembly,
            'requirments' => json_encode($this->requirments),
            'image' =>  $this->image->store('images', 'public'),
            'end_style_1' => json_encode($this->endstyle1),
            'end_style_2' => json_encode($this->endstyle2),
            'connection_size_1' => json_encode($this->connection_size_1),
            'connection_size_2' => json_encode($this->connection_size_2),
            'regulations' => json_encode($this->regulations),
            'collar_id' => $this->collar_id,
            'max_length' => $this->max_length
        ]);



        return redirect('admin/hose/index');
    }


    public function render()
    {

        return view('livewire.hoses.create');
    }
}
