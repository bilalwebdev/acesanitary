<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Series;
use App\Models\SeriesMedia;
use Illuminate\Support\Facades\Log;

class ChemicalCompatibilityController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Chemical Compatibility';

        // module name
        $this->module_name = 'chemical-compatibility';

        // directory path of the module
        $this->module_path = 'chemical-compatibility';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\ChemicalCompatibility";
    }
    public function index()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $id = 0;
        $media = Media::where('status', 1)->paginate();
        $module_action = 'List';
        return view('backend.chemical-compatibility.index', compact('module_title', 'media', 'id', 'module_name', 'module_path', 'module_icon', 'module_action'));
    }

    public function check($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_action = 'List';
        return view('backend.chemical-compatibility.index', compact('module_title', 'id', 'module_name', 'module_path', 'module_icon', 'module_action'));
    }
    public function destroy(Media $media, $hose_id)
    {
        $oldMedia = SeriesMedia::where('media_id', $media->id)->first();
        if ($oldMedia) {

            if ($oldMedia->media_id == $media->id) {
                SeriesMedia::where('id', $oldMedia->id)->delete();
            }
        }
        //$media->delete();
        flash("<i class='fas fa-check'></i>Chemical Compatibility Deleted Successfully")->success()->important();
        return redirect('admin/chemical-compatibility/check/' . $hose_id);
    }
}
