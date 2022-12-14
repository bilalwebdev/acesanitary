<?php

namespace App\Http\Livewire\ChemicalCompatibility;

use App\Models\Media;
use App\Models\Hose;
use App\Models\Series;
use App\Models\SeriesMedia;
use Livewire\Component;

class ShowChemicalsList extends Component
{
    public $module_name = "chemical-compatibility";

    public $mediaId;
    public $series;
    public $hose;
    public $series_id;
    public $series_media;
    public $material;
    public $compatibility = "A";


    public function mount($id)
    {
        //dd(Media::find(23)->compatibilityInfo()->get());
        $this->hose = Hose::find($id);
        $this->material = $this->hose->material;
        $this->series = Series::find($this->hose->series_id);
        $this->series_id = $this->hose->series_id;
        $this->series_media = SeriesMedia::where('series_id', $this->series->id)->get();
    }

    public function edit(Media $media)
    {

        $this->mediaId = $media->id;
        // dd($this->mediaId);
    }


    public function save(Media $media)
    {

        $oldMedia = SeriesMedia::where('series_id', $this->hose->series_id)->where('media_id', $media->id)->first();

        if ($oldMedia) {
            if (
                $oldMedia->media_id == $media->id  &&
                $oldMedia->series_id == $this->series_id &&
                $oldMedia->hoseMaterial == $this->material->name
            ) {
                SeriesMedia::where('id', $oldMedia->id)->delete();
            }
        }
        $this->validate([
            'compatibility' => 'required'
        ]);

        SeriesMedia::create([
            'series_id' => $this->series->id,
            'media_id' => $media->id,
            'compatibility' => $this->compatibility,
            'hoseMaterial' => $this->material->name
        ]);
        flash("<i class='fas fa-check'></i>Chemical Compatibility Updated Successfully")->success()->important();
        return redirect('admin/chemical-compatibility/check/' . $this->hose->id);
    }

    public function render()
    {
        $media = Media::where('status', 1)->paginate();

        return view('livewire.chemical-compatibility.show-chemicals-list', compact('media'));
    }
}
