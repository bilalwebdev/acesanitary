<?php

namespace App\Http\Controllers\Backend;

use App\Models\Regulations;
use Illuminate\Http\Request;
use App\Authorizable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class RegulationsController extends Controller
{

    use Authorizable;


    public function __construct()
    {
        // Page Title
        $this->module_title = 'Restrictions/Regulations';

        // module name
        $this->module_name = 'regulations';

        // directory path of the module
        $this->module_path = 'regulations';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Regulations";
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

        $regulations = Regulations::latest()->paginate();


        return view('backend.regulations.index', compact('module_title', 'regulations', 'module_name', 'module_path', 'module_icon', 'module_action'));
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

        Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view("backend.$module_name.create", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulations  $regulations
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

        $regulation = $module_model::findOrFail($id);

        Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'regulation')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulations  $regulations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.regulations.edit', compact('module_title','id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulations  $regulations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulations $regulations)
    {
        $regulations->delete();
        flash("<i class='fas fa-check'></i> Restrictions/Regulations Deleted Successfully")->success()->important();
        return redirect('admin/regulations/index');
    }
}
