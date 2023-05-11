<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\birthCertificate;
use App\Models\Proposal;
use App\Models\Files;
use Session;
use SimpleXMLElement;
error_reporting(1);

class ApiController extends Controller
{
    
    public function enquiryForms(){
        dd('hi');
       // $birthCertificate= birthCertificate::all();
        return response($birthCertificate, 200);
    }
    
     public function enquiryFormsData(Request $request){
         $id = $request->id;
        //$birthCertificate = birthCertificate::where('id',$id)->all();
        return response($id, 200);
    }

    
    
  

            

   
   
    
}
