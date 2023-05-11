<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;
use App\Models\CitizenSubServiceMst;
use App\Models\DocumentMst;
use App\Models\SubServiceDocumentMap;

class ReportsController extends Controller
{
    public function reports()
    {
        $service=CitizenServiceMst::get();
        $sub_service=CitizenSubServiceMst::get();
        $document=DocumentMst::get();
        $doc_map=SubServiceDocumentMap::with('service','sub_Service','document')->get(); // one time load using with


        return view('admin.reports',compact('service','sub_service','document','doc_map'));
    }


    public function reports_edit(Request $request)
    {
        $service=CitizenServiceMst::get();
        $sub_service=CitizenSubServiceMst::get();
        $documents=DocumentMst::get();
        $edit = SubServiceDocumentMap::where('id',$request->id);
        return view('admin.edit-sub_doc_map',compact('edit','service','sub_service','documents'));
    }



}
