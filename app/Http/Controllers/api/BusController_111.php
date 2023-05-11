<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\api\apk_versionModel;
use DB;
use Session;
use Validator;
use App\Models\BusMst;
use App\Models\mandal;
use App\Models\BusStatusLog;
error_reporting(0);
use Hash;
class BusController extends Controller
{
    
    public function index(Request $request){
       // dd(Session::get('user_id'));
       date_default_timezone_set('Asia/Calcutta'); 
       $username = $request->username;
       $token = $request->token;

       $rules=array(
        'username' => 'required',
        'token' => 'required',
        
    );
    $messages=array(
    'username.required' => 'username required.',
    'token.required' => 'token required.',
    
    );

       $validator=Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                {
                    if (empty($request->username)) {
                        $username_err  = 'username required';
                   }
                   if (empty($request->token)) {
                    $token_err  = 'token required';
                    }
                   
                    $response['status_code'] = "100";
                    $response['message']     = $username_err.' '.$token_err;
                    
                    
                  
                    echo json_encode($response);
                    exit;
                }

                /////////////verification/////////
                 ////////////////verification/////////
                 $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
                 //dd($user_verify);
                      if($user_verify == null){
                          $response['status_code'] = "100";
                         $response['message']     = "Authentication Failed";
                      echo json_encode($response);
                      exit;
                     }
       //dd($username);
       $bus_list1 = BusMst::leftjoin('districtgrv','districtgrv.DistCode','bus_mst.district_id')->
       leftjoin('mandalgrv','mandalgrv.ulbcode','bus_mst.mandal_id')->
       leftjoin('constituency_mst','constituency_mst.id','mandalgrv.const_code')->
       leftjoin('status_mst','status_mst.status_id','bus_mst.last_status')->
       where('bus_mst.officer_mobile',$username)->select('bus_mst.*','constituency_mst.const_name','districtgrv.DistName','mandalgrv.ulbname','status_mst.status_desc')->get();
        
        
        $data['busdet'] = array();
       if(count($bus_list1)>0){
      //  $busdet['status_code'] = '200';
            foreach($bus_list1 as $key=>$val){
              
                $upcoming_status = DB::table('status_mst')->where('status_id', $val->last_status+1)->first();
            
                $row['category'] = $val->bus_no;
                $row['bus_id'] = $val->id;
                $row['last_status'] = $val->last_status;
                $row['upcoming_status_name'] = $upcoming_status->status_desc ?? '';
                $row['user_name'] = $val->lia_officer_name.'('.$val->DistName.')';
                $row['reched_status'] = $val->mandal_reached_status;
           
                $row['details'] = array();
                $temp = array();
                $status_mst =DB::table('status_mst')->get();
                //dd($status_mst);
                if($val->mandal_reached_status == 1){
                    $temp = ['name'=>'Bus not yet reached Mandal Head Quarters', 'value'=>'00:00:00'];
                    array_push($row['details'],$temp);
                    array_push($data['busdet'],$row);
                }else{
                      //////condition/////
                                        // $bus_data_mandal = DB::table('bus_mst')->where('id','1')->get();
                                        $BusStatusLog_data = BusStatusLog::leftjoin('status_mst','status_mst.status_id','bus_status_logs.status_id')
                                        ->where('bus_id',$val->id)
                                        ->orderBy('log_id', 'asc')
                                        ->pluck('status_value');
                        //dd(count($BusStatusLog));       
                        if(count($BusStatusLog_data)>1)   {         
                        foreach($status_mst as $key=>$log){

                        $BusStatusLog = BusStatusLog::leftjoin('status_mst','status_mst.status_id','bus_status_logs.status_id')
                                                ->where('bus_id',$val->id)
                                                ->where('bus_status_logs.status_id',$log->status_id)
                                                ->orderBy('log_id', 'asc')
                                                ->value('status_value');   
                                                if($BusStatusLog && $BusStatusLog != '00:00:00'){
                                                    
                                                $temp = ['name'=>$log->status_desc, 'value'=>$BusStatusLog ?? ''];
                                                array_push($row['details'],$temp);
                                                
                                                }
                        }
                        }else{

                        foreach($status_mst as $key=>$log){
                        $BusStatusLog = BusStatusLog::leftjoin('status_mst','status_mst.status_id','bus_status_logs.status_id')
                                                ->where('bus_id',$val->id)
                                                ->where('bus_status_logs.status_id',$log->status_id)
                                                ->orderBy('log_id', 'asc')
                                                ->value('status_value');   
                                                if($BusStatusLog){
                                                    
                                                $temp = ['name'=>$log->status_desc, 'value'=>$BusStatusLog ?? ''];
                                                array_push($row['details'],$temp);
                                                
                                                }
                                            }
                        }

                        array_push($data['busdet'],$row);
                }
              
            }
           // dd($data['busdet']);
            echo json_encode($data['busdet']);
            
          
        }else{
            return response()->json([
                'status_code' => '100',
                'message' => 'No data fetched',
              
            ]);
        }
    }
    
    public function update_bus_reached_data(Request $request){
        
        
        
        
        
        date_default_timezone_set('Asia/Calcutta'); 
        // dd('hgi');
        $username = $request->username;
        $bus_id = $request->bus_id;
        $token = $request->token;
        $status_id = $request->status_id;
       

        $time = $request->time;
        $date = $request->date;
        $lati = $request->lati;
        $longi = $request->longi;
        

        $rules=array(
            'username' => 'required',
            'bus_id' => 'required',
            'status_id' => 'required',
            'token' => 'required',
            'date' =>'required',
            'time' => 'required',
            'lati' => 'required',
            'longi' => 'required'
        );
        $messages=array(
        
        'bus_id.required' => 'bus id required.',
        'date.required' => 'bus no  required.',
        'token.required' => 'token  required.',
        
        'time.required' => 'time required.',
       
        'lati.required' => 'lati required.',
        'longi.required' => 'longi required.',
        'status_id.required' => 'status required.'
        
        );

           $validator=Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                {
                    if (empty($request->username)) {
                        $username_err  = 'username required';
                    }
                    if (empty($request->bus_id)) {
                        $bus_id_err  = 'bus id required';
                    }
                    if (empty($request->status_id)) {
                        $status_id_err  = 'bus no required';
                    }

                    if (empty($request->time)) {
                        $time_err  = 'time required';
                    }
                    if (empty($request->date)) {
                        $remarks_err  = 'date required';
                    }
                    if (empty($request->time)) {
                        $remarks_err  = 'Time required';
                    }
                    if (empty($request->token)) {
                        $token_err  = 'token required';
                    }
                    if (empty($request->lati)) {
                        $lati_err  = 'latitude required';
                    }
                    if (empty($request->longi)) {
                        $longi_err  = 'longitude required';
                    }
                    
                    $response['status_code'] = "100";
                    $response['message']     = $username_err.' '.$bus_id_err.' '.$time_err.' '.$remarks_err.' '.$token_err.' '. $status_id_err.' '. $lati_err.' '. $longi_err;
                    echo json_encode($response);
                    exit;
                }

               ////////////////verification/////////
                   $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
                   //dd($user_verify);
                        if($user_verify == null){
                            $response['status_code'] = "100";
                           $response['message']     = "Authentication Failed";
                        echo json_encode($response);
                        exit;
                       }
                $BusMst = BusMst::find($bus_id);
              
                $BusMst->mandal_reached_status = $status_id;
                $BusMst->mandal_reached_time = $time;
                $date_new=str_replace("/","-",$date);
//  date('Y-m-d',strtotime($date));
                $BusMst->mandal_reached_date = date('Y-m-d',strtotime($date_new));
                $BusMst->mandali_lati = $lati;
                $BusMst->mandal_longi = $longi;
                
                    
               
              
              

                if($BusMst->update()){
                 return response()->json([
                     'status_code' => '200',
                     'message' => 'Updated Successfully',
                    
                 ]);
                }else{
                    return response()->json([
                        'status_code' => '100',
                        'message' => 'Something went wrong',
                       
                    ]);  
                }
     
        
        
    }


    public function edit_bus(Request $request){
        // dd(Session::get('user_id'));
        date_default_timezone_set('Asia/Calcutta'); 
        $username = $request->username;
        $bus_id = $request->bus_id;
        $token = $request->token;
        $rules=array(
            'username' => 'required',
            'bus_id' => 'required',
            'token' => 'required',
            
        );
        $messages=array(
        'username.required' => 'username required.',
        'bus_id.required' => 'bus_id required.',
        'token.required' => 'token required.',
        
        );
    
           $validator=Validator::make($request->all(),$rules,$messages);
                if($validator->fails())
                    {
                        if (empty($request->username)) {
                            $username_err  = 'username required';
                       }
                       if (empty($request->bus_id)) {
                        $bus_id_err  = 'bus id required';
                        }
                        if (empty($request->token)) {
                            $token_err  = 'token required';
                        }
                       
                        $response['status_code'] = "100";
                        $response['message']     = $username_err.' '.$token_err.' '.$bus_id_err;
                        
                        
                      
                        echo json_encode($response);
                        exit;
                    }
       ////////////////verification/////////
                   $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
                   //dd($user_verify);
                        if($user_verify == null){
                            $response['status_code'] = "100";
                           $response['message']     = "Authentication Failed";
                        echo json_encode($response);
                        exit;
                       }

        $bus_list1 = BusMst::leftjoin('districtgrv','districtgrv.DistCode','bus_mst.district_id')->
        leftjoin('mandalgrv','mandalgrv.ulbcode','bus_mst.mandal_id')->
        leftjoin('constituency_mst','constituency_mst.id','mandalgrv.const_code')->
        leftjoin('status_mst','status_mst.status_id','bus_mst.last_status')->
        where('bus_mst.id',$bus_id)->select('bus_mst.*','constituency_mst.const_name','districtgrv.DistName','mandalgrv.ulbname','status_mst.status_desc')->first();
        if($bus_list1->id){

        
                    $data['bus_no'] = $bus_list1->bus_no;
                    $data['bus_id'] = $bus_list1->id;
                    $data['driver_name'] = $bus_list1->driver_name ? $bus_list1->driver_name : '';
                    $data['driver_mobile'] = $bus_list1->driver_mobile ? $bus_list1->driver_mobile : '';
                    $data['participants'] = $bus_list1->participants;
                    $data['last_status'] = $bus_list1->last_status;
      
        
        
                 return response()->json([
                     'status_code' => '200',
                     'message' => 'Successfully data fetched',
                     'bus_data' =>  $data
                 ]);
        }else{
            return response()->json([
                'status_code' => '100',
                'message' => 'No data fetched',
                
            ]);
        }
     }

    public function update_bus(Request $request){
        date_default_timezone_set('Asia/Calcutta'); 
        // dd($request->bus_no);
        $username = $request->username;
        $bus_id = $request->bus_id;
        $bus_no = $request->bus_no;
        $token = $request->token;
        $driver_name = $request->driver_name;
        $driver_mobile = $request->driver_mobile;
        $participants = $request->participants;

        $time = $request->time;
        $remarks = $request->remarks;
        $lati = $request->lati;
        $longi = $request->longi;

        $rules=array(
            'username' => 'required',
            'bus_id' => 'required',
            'bus_no' => 'required',
            'token' => 'required',
            'driver_name' => 'required',
            'driver_mobile' => 'required',
            'participants' => 'required',
            'time' => 'required',
           // 'remarks' => 'required',
            'lati' => 'required',
            'longi' => 'required',
        );
        $messages=array(
        'username.required' => 'username required.',
        'bus_id.required' => 'bus id required.',
        'bus_no.required' => 'bus no  required.',
        'token.required' => 'token  required.',
        'driver_name.required' => 'driver name required.',
        'driver_mobile.required' => 'driver mobile required.',
        'participants.required' => 'participants required.',
        'time.required' => 'time required.',
        //'remarks.required' => 'remarks required.',
        
        );

           $validator=Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                {
                    if (empty($request->username)) {
                        $username_err  = 'username required';
                    }
                    if (empty($request->bus_id)) {
                        $bus_id_err  = 'bus id required';
                    }
                    if (empty($request->bus_no)) {
                        $bus_no_err  = 'bus no required';
                    }
                    if (empty($request->driver_name)) {
                        $driver_name_err  = 'driver name required';
                    }
                    if (empty($request->driver_mobile)) {
                        $driver_mobile_err  = 'driver mobile required';
                    }
                    if (empty($request->participants)) {
                        $participants_err  = 'participants required';
                    }
                    if (empty($request->time)) {
                        $time_err  = 'time required';
                    }
                    // if (empty($request->remarks)) {
                    //     $remarks_err  = 'remarks required';
                    // }
                    if (empty($request->token)) {
                        $token_err  = 'token required';
                    }
                    if (empty($request->lati)) {
                        $lati_err  = 'latitude required';
                    }
                    if (empty($request->longi)) {
                        $longi_err  = 'longitude required';
                    }
                    
                    $response['status_code'] = "100";
                    $response['message']     = $username_err.' '.$bus_id_err.' '.$bus_no_err.' '.$driver_name_err.' '.$driver_mobile_err.' '.$participants_err.' '.$time_err.' '.$token_err.' '.$lati_err.' '.$longi_err;
                    echo json_encode($response);
                    exit;
                }

                 ////////////////verification/////////
                 $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
                 //dd($user_verify);
                      if($user_verify == null){
                          $response['status_code'] = "100";
                         $response['message']     = "Authentication Failed";
                      echo json_encode($response);
                      exit;
                     }
       
                $BusMst = BusMst::find($bus_id);
                $BusMst->bus_no = $bus_no;
                $BusMst->driver_name = $driver_name;
                $BusMst->driver_mobile = $driver_mobile;
                $BusMst->participants = $participants;
                $BusMst->last_status = '2';
                $BusMst->lati = $request->lati;
                $BusMst->longi = $request->longi;
                $BusMst->update(); 
                    
                $BusStatusLog = new BusStatusLog;
                $BusStatusLog->bus_id = $bus_id;
                $BusStatusLog->status_id = '2';
                $BusStatusLog->status_value = $time;
                $BusStatusLog->remarks = $remarks;
                $BusStatusLog->lati = $request->lati;
                $BusStatusLog->longi = $request->longi;
                $BusStatusLog->updated_through = '2';
                
                $BusStatusLog->save();

                if($BusMst->update() && $BusStatusLog->save()){
                 return response()->json([
                     'status_code' => '200',
                     'message' => 'Updated Successfully',
                    
                 ]);
                }else{
                    return response()->json([
                        'status_code' => '100',
                        'message' => 'Something went wrong',
                       
                    ]);  
                }
     }
    

     public function update_bus_status(Request $request){
        date_default_timezone_set('Asia/Calcutta'); 
        // dd('hgi');
        $username = $request->username;
        $bus_id = $request->bus_id;
        $token = $request->token;
        $status_id = $request->status_id;
       

        $time = $request->time;
        $remarks = $request->remarks;
        $lati = $request->lati;
        $longi = $request->longi;

        $rules=array(
            'username' => 'required',
            'bus_id' => 'required',
            'status_id' => 'required',
            'token' => 'required',
           
            'time' => 'required',
            'lati' => 'required',
            'longi' => 'required',
        );
        $messages=array(
        'username.required' => 'username required.',
        'bus_id.required' => 'bus id required.',
        'status_id.required' => 'bus no  required.',
        'token.required' => 'token  required.',
        
        'time.required' => 'time required.',
        'remarks.required' => 'remarks required.',
        'lati.required' => 'lati required.',
        'longi.required' => 'longi required.',
        
        );

           $validator=Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                {
                    if (empty($request->username)) {
                        $username_err  = 'username required';
                    }
                    if (empty($request->bus_id)) {
                        $bus_id_err  = 'bus id required';
                    }
                    if (empty($request->status_id)) {
                        $status_id_err  = 'bus no required';
                    }

                    if (empty($request->time)) {
                        $time_err  = 'time required';
                    }
                    if (empty($request->remarks)) {
                        $remarks_err  = 'remarks required';
                    }
                    if (empty($request->token)) {
                        $token_err  = 'token required';
                    }
                    if (empty($request->lati)) {
                        $lati_err  = 'latitude required';
                    }
                    if (empty($request->longi)) {
                        $longi_err  = 'longitude required';
                    }
                    
                    $response['status_code'] = "100";
                    $response['message']     = $username_err.' '.$bus_id_err.' '.$time_err.' '.$remarks_err.' '.$token_err.' '. $status_id_err.' '. $lati_err.' '. $longi_err;
                    echo json_encode($response);
                    exit;
                }

               ////////////////verification/////////
                   $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
                   //dd($user_verify);
                        if($user_verify == null){
                            $response['status_code'] = "100";
                           $response['message']     = "Authentication Failed";
                        echo json_encode($response);
                        exit;
                       }
                $BusMst = BusMst::find($bus_id);
              
                $BusMst->last_status = $status_id+1;
                $BusMst->lati = $lati;
                $BusMst->longi = $longi;
                $BusMst->update(); 
                    
                $BusStatusLog = new BusStatusLog;
                $BusStatusLog->bus_id = $bus_id;
                $BusStatusLog->status_id = $status_id+1;
                $BusStatusLog->status_value = $time;
                $BusStatusLog->lati = $lati;
                $BusStatusLog->longi = $longi;
                $BusStatusLog->updated_through = '2';
              
                $BusStatusLog->save();

                if($BusMst->update() && $BusStatusLog->save()){
                 return response()->json([
                     'status_code' => '200',
                     'message' => 'Updated Successfully',
                    
                 ]);
                }else{
                    return response()->json([
                        'status_code' => '100',
                        'message' => 'Something went wrong',
                       
                    ]);  
                }
     }
    
     public function check_token_status(Request $request){
        
        
        $username = $request->username;
       
        $token = $request->token;
        

        $rules=array(
            'username' => 'required',
           
            'token' => 'required',
           
        );
        $messages=array(
        'username.required' => 'username required.',
        
        'token.required' => 'token  required.',
       
        
        );

           $validator=Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                {
                    if (empty($request->username)) {
                        $username_err  = 'username required';
                    }
                   
                   
                   
                    if (empty($request->token)) {
                        $token_err  = 'token required';
                    }
                   
                    
                    $response['status_code'] = "100";
                    $response['message']     = $username_err.' '.$token_err;
                    echo json_encode($response);
                    exit;
                }

               ////////////////verification/////////
                $user_verify = DB::table('users')->where('email', $username)->where('remember_token',$token)->first();
           
                    if($user_verify == null){
                        $response['status_code'] = "100";
                        $response['message']     = "Authentication Failed";
                    echo json_encode($response);
                    exit;
                    }else{
                        $response['status_code'] = "200";
                        $response['message']     = "Authentication Successful";
                        
                        $params = array('officer_mobile'=>$username);
                        
                        $result = DB::table('bus_mst')->join('districtgrv','bus_mst.district_id','=','districtgrv.DistCode')->where($params)->get();
                        $name = $result[0]->lia_officer_name."(".$result[0]->DistName.")";
                        $response['officer_name']     = $name;
                        
                        
                        
                       // $response['username']     = "Authentication Successful";
                    echo json_encode($response);
                    exit;
                    }
              
     }
    

    
    
  

            

   
   
    
}