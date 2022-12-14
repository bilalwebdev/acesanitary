<?php

namespace App\Http\Controllers\Backend;

use App\Models\EndStyle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Authorizable;
use App\Imports\EndStyleImport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;


class EndStyleController extends Controller
{

    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'End Styles';

        // module name
        $this->module_name = 'endstyles';

        // directory path of the module
        $this->module_path = 'endstyles';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\EndStyle";
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

        $endstyles = EndStyle::latest()->paginate();


        return view('backend.endstyles.index', compact('module_title', 'endstyles', 'module_name', 'module_path', 'module_icon', 'module_action'));
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

        return view("backend.$module_name.create", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EndStyle  $endStyle
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

        $endstyle = EndStyle::findOrFail($id);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'endstyle')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EndStyle  $endStyle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.endstyles.edit', compact('module_title', 'id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EndStyle  $endStyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(EndStyle $endstyle)
    {
        $endstyle->delete();
        flash("<i class='fas fa-check'></i> Hose Deleted Successfully")->success()->important();
        return redirect('admin/endstyle/index');
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

        return view("backend.endstyles.import", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function importEndStyle(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        Excel::import(
            new EndStyleImport,
            $request->file('file')
        );
        flash("<i class='fas fa-check'></i> Data Imported Successfully")->success()->important();
        return redirect('admin/endstyle/index');
    }
    public function downloadFile(Request $request)
    {
        $filePath = public_path('import-samples/endstyles-sample.csv');
        return Response::download($filePath);
    }
}
