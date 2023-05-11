<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;
use App\Models\CitizenSubServiceMst;
use App\Models\DocumentMst;
use App\Models\SubServiceDocumentMap;
class LinkDocumentsController extends Controller
{
    public function linkdocument()
    {
       $service= CitizenServiceMst::get();
       $documents=DocumentMst::get();
    //    dd($documents);

        return view('admin.link-documents',compact('service','documents'));
    }




    public function linkdocument_ajax(Request $request)
    {
        $service= CitizenSubServiceMst::where('service_id',$request->service_id)->get();
        // dd($service);
        $html="<option value=''>--Select sub_services --</option>";
        foreach($service as $sub){
            $html.="<option value=".$sub->sub_service_id.">".$sub->sub_service_name."</option>";

        }
        return response()->json($html);

    }

public function linkdocument_insert( Request $request){


    $this->validate($request,[

       'service'=>'required',
       'subservice'=>'required',
       'documents'=>'required|array',

    ]);

    $service=$request->service;
    $subservice=$request->subservice;
    $documents=$request->documents;

    $cnt = count($documents);

    for($i=0; $i<$cnt; $i++)
    {
        SubServiceDocumentMap::updateOrCreate(
            [
                'service_id'=>$service,
               'sub_service_id' => $subservice,
                'document_id' => $documents[$i]
            ],
            [
                'service_id'=>$service,
               'sub_service_id' => $subservice,
                'document_id' => $documents[$i]
            ]
            );
    }


    return response()->json(['status' => 'success']);
}
}


