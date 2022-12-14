<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authorizable;
use App\Imports\AccessoriesImport;
use App\Models\Accessories;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class AccessoriesController extends Controller
{

    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Accessories';

        // module name
        $this->module_name = 'accessories';

        // directory path of the module
        $this->module_path = 'accessories';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Accessories";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'List';

        $accessories = Accessories::latest()->paginate();


        return view('backend.accessories.index', compact('module_title', 'accessories', 'module_name', 'module_path', 'module_icon', 'module_action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view("backend.accessories.create", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessories\Collar  $collar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $module_action = 'Show';

        $accessory = Accessories::findOrFail($id);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view('backend.accessories.show',  compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessories\Collar  $collar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.accessories.edit', compact('module_title', 'id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessories\Collar  $collar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessories $accessory)
    {
        $accessory->delete();
        flash("<i class='fas fa-check'></i> Accessory Deleted Successfully")->success()->important();
        return redirect('admin/accessories/index');
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

        return view("backend.accessories.import", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function importAccessories(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv'
        ]);
        Excel::import(
            new AccessoriesImport,
            $request->file('file')
        );
        flash("<i class='fas fa-check'></i> Data Imported Successfully")->success()->important();
        return redirect('admin/accessories/index');
    }
    public function downloadFile(Request $request)
    {
        $filePath = public_path('import-samples/accessories-sample.csv');
        return Response::download($filePath);
    }
}
