<?php

namespace App\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DistributorsController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Distributors';

        // module name
        $this->module_name = 'distributors';

        // directory path of the module
        $this->module_path = 'distributors';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\Distributor";
    }

    public function index()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'List';

        $distributors = Distributor::latest()->paginate();


        return view('backend.distributors.index', compact('module_title', 'distributors', 'module_name', 'module_path', 'module_icon', 'module_action'));
    }

    public function create()
    {

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Create';


        return view('backend.distributors.create', compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action'));
    }
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $module_action = 'Show';

        $distributor = Distributor::findOrFail($id);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'distributor')
        );
    }

    public function edit($id)
    {


        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.distributors.edit', compact('module_title', 'id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        flash("<i class='fas fa-check'></i> Distributor Deleted Successfully")->success()->important();
        return redirect('admin/distributor/index');
    }
}
