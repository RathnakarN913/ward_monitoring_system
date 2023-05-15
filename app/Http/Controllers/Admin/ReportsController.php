<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;
use App\Models\CitizenSubServiceMst;
use App\Models\DocumentMst;
use App\Models\SubServiceDocumentMap;
use Auth;



class ReportsController extends Controller
{
    public function reports(Request $request)
    {
        // dd($request->all());
        if($request->services != null){
            $attr = ['service_id' => $request->services];
            $service_id = $request->services;
        }else{
            $attr = [];
            $service_id = '';
        }
        if($request->sub_service != null){
            $attr1 = ['sub_service_id' => $request->sub_service];
            $sub_service_id = $request->sub_service;
        }else{
            $attr1 = [];
            $sub_service_id = '';
        }

        if($request->document != null){
            $attr2 = ['document_id' => $request->document];
            $document_id = $request->document;
        }else{
            $attr2 = [];
            $document_id = '';
        }



        $service=CitizenServiceMst::where('status','0')->get();
        $sub_service=CitizenSubServiceMst::where('status','0')->get();
        $document=DocumentMst::where('status','0')->get();

        $doc_map=SubServiceDocumentMap::select('service_id', 'sub_service_id')->where('status', '=', '0')
        ->where($attr)->where($attr1)->where($attr2)
        ->groupBy('service_id', 'sub_service_id')->get();


        return view('admin.reports',compact('service','sub_service','document','doc_map','service_id','sub_service_id','document_id'));
    }


    public function edit($service_id,$sub_service_id)
    {
                $document = DocumentMst::get();
                // dd($document);
                $service=CitizenServiceMst::get();
                $sub_service=CitizenSubServiceMst::get();
              $updateser=SubServiceDocumentMap::where('service_id',$service_id)->where('sub_service_id',$sub_service_id)->get();
              $ser_id=$service_id;
             $sub_id=$sub_service_id;
              return view('admin.edit-link-doc',get_defined_vars());
    }
    public function reports_update(Request $request)
    {
        $request->validate([
            'service' =>  'required'  ,
            'documents' =>  'required' ,
            'sub_service' => 'required' ,

        ] );

        // $document_update = SubServiceDocumentMap::find($request->userid);
        // $document_update->service_id = $request->service;
        // $document_update->sub_service_id = $request->sub_service;
        // $document_update->document_id = $request->documents;

        // $document_update->updated_by = Auth::id();
        // $document_update->save();

        $service=$request->service;
        $subservice=$request->sub_service;
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

    public function link_doc_ajax(Request $request)
    {
        $service= CitizenSubServiceMst::where('service_id',$request->service_id)->get();
        // dd($service);
        $html="<option value=''>--Select sub_services --</option>";
        foreach($service as $sub){
            $html.="<option value=".$sub->sub_service_id.">".$sub->sub_service_name."</option>";

        }
        return response()->json($html);

    }
}
