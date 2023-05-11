<?php

namespace App\Http\Controllers\Admin;
use  App\Models\{CitizenSubServiceMst,CitizenServiceMst};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddSubServiceController extends Controller
{
    public function subservice()
    {
            $sub_service=CitizenSubServiceMst::where('status','=','0')->get();
            $service= CitizenServiceMst::where('status','=','0')->get();
        return view('admin.add-sub-service',compact('sub_service','service'));
    }
public function create(Request $request)
{
    $request->validate([
        'service' =>['required'],
        'sub_service' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
    ], [
        'sub_service.regex' => 'The :service field can only contain letters.',
    ]);
    $sub_service = new CitizenSubServiceMst;
    $sub_service->service_id = $request->service;
    $sub_service->sub_service_name = $request->sub_service;
    $sub_service->created_by = Auth::id();
    $sub_service->save();
    // dd($sub_service);
    return response()->json(['status' => 'success']);
}

public function edit($id)
{
    $sub_service = CitizenSubServiceMst::find($id);
    $service= CitizenServiceMst::where('status','=','0')->get();
    return view('admin.edit-sub-service',compact('sub_service','service'));
}
public function update(Request $request)
    {
        $request->validate([
            'service' => ['required' ],
            'sub_service' => ['required', 'regex:/^[a-zA-Z\s]+$/'],

        ], [

               'sub_service.regex' => 'The :sub_service field can only contain letters.',
        ]);
        $sub_service = CitizenSubServiceMst::find($request->id);
        $sub_service->service_id = $request->service;
        $sub_service->sub_service_name = $request->sub_service;
        $sub_service->updated_by = Auth::id();
        $sub_service->save();
        return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
        CitizenSubServiceMst::where('sub_service_id',$request->id)
        ->update(['status' => 2,'updated_by' => Auth::id()]);
        return response()->json(['msg' =>'Record deleted successfully..!'],201);
    }


}
