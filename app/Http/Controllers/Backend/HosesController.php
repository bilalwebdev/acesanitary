<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Authorizable;
use App\Imports\HoseImport;
use App\Models\Hose;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class HosesController extends Controller
{

    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Hoses';

        // module name
        $this->module_name = 'hoses';

        // directory path of the module
        $this->module_path = 'hoses';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Hose";
    }

    public function index()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $hoses = Hose::latest()->paginate();


        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view("backend.$module_name.index", compact('module_title', 'hoses', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view("backend.$module_name.create", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function edit($id)
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view("backend.$module_name.edit", compact('module_title', 'id', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $module_action = 'Show';

        $hose = Hose::findOrFail($id);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'hose')
        );
    }
    public function destroy(Hose $hose)
    {
        $hose->delete();
        flash("<i class='fas fa-check'></i> Hose Deleted Successfully")->success()->important();
        return redirect('admin/hose/index');
    }

    public function import()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Import';


        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view("backend.hoses.import", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function importHoses(Request $request)
    {

        Excel::import(
            new HoseImport,
            $request->file('file')
        );
        flash("<i class='fas fa-check'></i> Data Imported Successfully")->success()->important();
        return redirect('admin/hose/index');
    }
    public function downloadFile(Request $request)
    {
        $filePath = public_path('import-samples/hoses-sample.csv');
        return Response::download($filePath);
    }
}
