<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;
use Illuminate\Support\Facades\Auth;

class AddServiceController extends Controller
{
    public function service()
    {
        $service= CitizenServiceMst::where('status','=','0')->get();
        return view('admin.add-service',get_defined_vars());
    }

    public function create(Request $request)
    {
        $request->validate([
            'service' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
        ], [
            'service.regex' => 'The :service field can only contain letters.',
        ]);
        $service = new CitizenServiceMst;
        $service->service_name = $request->service;
        $service->created_by = Auth::id();
        $service->save();
        return response()->json(['status' => 'success']);
    }

    public function edit($id)
    {
        $service = CitizenServiceMst::find($id);
        return view('admin.edit-service',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'service' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
        ], [
            'service.regex' => 'The :service field can only contain letters.',
        ]);
        $service = CitizenServiceMst::find($request->id);
        $service->service_name = $request->service;
        $service->updated_by = Auth::id();
        $service->save();
        return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
        CitizenServiceMst::where('service_id',$request->id)->update(['status' => 2]);
        return response()->json(['msg' =>'Record deleted successfully..!'],201);
    }
}
