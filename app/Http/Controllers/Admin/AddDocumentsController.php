<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentMst;
use Illuminate\Support\Facades\Auth;

class AddDocumentsController extends Controller
{
    public function documents()
    {
        $document = DocumentMst::where('status', '=', '0')->get();
        return view('admin.add-documents',get_defined_vars());
    }

    public function create(Request $request)
    {
        $request->validate([
            'document' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
        ], [
            'document.regex' => 'The :service field can only contain letters.',
        ]);
        $document = new DocumentMst;
        $document->document_name = $request->document;
        $document->created_by = Auth::id();
        $document->save();
        return response()->json(['status' => 'success']);
    }

    public function edit($id)
    {
        $document = DocumentMst::find($id);
        return view('admin.edit-document',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'document' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
        ], [
            'document.regex' => 'The :service field can only contain letters.',
        ]);
        $document = DocumentMst::find($request->id);
        $document->document_name = $request->document;
        $document->updated_by = Auth::id();
        $document->save();
        return response()->json(['status' => 'success']);
    }

    public function delete(Request $request)
    {
        DocumentMst::where('document_id',$request->id)->update(['status' => 2,'updated_by' => Auth::id()]);
        return response()->json(['msg' =>'Record deleted successfully..!'],201);
    }
}
