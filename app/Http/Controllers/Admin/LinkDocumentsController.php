<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinkDocumentsController extends Controller
{
    public function linkdocument()
    {
        return view('admin.link-documents');
    }
}
