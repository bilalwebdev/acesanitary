<?php

namespace App\Http\Controllers\Backend;

use App\Models\AcePrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Authorizable;
use Illuminate\Support\Facades\Log;

class AcePriceController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Ace Price';

        // module name
        $this->module_name = 'ace-price';

        // directory path of the module
        $this->module_path = 'ace-price';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\AcePrice";
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

        $ace_price_list = AcePrice::latest()->paginate();


        return view('backend.ace-price.index', compact('module_title', 'ace_price_list', 'module_name', 'module_path', 'module_icon', 'module_action'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcePrice  $acePrice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.ace-price.edit', compact('module_title', 'id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcePrice  $acePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcePrice $acePrice)
    {
        $acePrice->delete();
        flash("<i class='fas fa-check'></i> Ace Price Deleted Successfully")->success()->important();
        return redirect('admin/ace-price/index');
    }
}
