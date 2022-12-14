<?php

namespace App\Http\Controllers\Backend;

use App\Models\ToleranceMessaging;
use App\Authorizable;
use App\Http\Controllers\Controller;
use App\Imports\ToleranceMessagingImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ToleranceMessagingController extends Controller
{

    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Tolerance Messaging';

        // module name
        $this->module_name = 'tolerance-messaging';

        // directory path of the module
        $this->module_path = 'tolerance-messaging';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\ToleranceMessaging";
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
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        //        $$module_name = $module_model::with('permissions')->paginate();
        $tolerance_messages = $module_model::latest()->paginate();

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_path.index",
            compact('module_title', 'module_name', 'tolerance_messages', 'module_icon', 'module_action')
        );
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
     * @param  \App\Models\ToleranceMessaging  $toleranceMessaging
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

        $tolerance_message = ToleranceMessaging::findOrFail($id);

        Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        return view(
            "backend.$module_name.show",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'tolerance_message')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToleranceMessaging  $toleranceMessaging
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;

        $module_action = 'Edit';


        return view('backend.tolerance-messaging.edit', compact('module_title', 'id',  'module_name', 'module_path', 'module_icon', 'module_action'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToleranceMessaging  $toleranceMessaging
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToleranceMessaging $toleranceMessage)
    {
        $toleranceMessage->delete();
        flash("<i class='fas fa-check'></i> Tolerance Message Deleted Successfully")->success()->important();
        return redirect('admin/tolerance-messaging/index');
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

        return view("backend.tolerance-messaging.import", compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular'));
    }

    public function importToleranceMessage(Request $request)
    {
        Excel::import(
            new ToleranceMessagingImport,
            $request->file('file')
        );

        flash("<i class='fas fa-check'></i> Data Imported Successfully")->success()->important();
        return redirect('admin/tolerance-messaging/index');
    }
    public function downloadFile(Request $request)
    {
        $filePath = public_path('import-samples/tolerance-messages-sample.csv');
        return Response::download($filePath);
    }
}
