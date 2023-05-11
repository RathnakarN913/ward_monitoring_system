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


    public function edit(Request $request)
    {
                $document = DocumentMst::get();
                $service=CitizenServiceMst::get();
                $sub_service=CitizenSubServiceMst::get();
        return view('admin.edit-document',compact('document','sub_service','service'));
    }

    
}
