<?php
	namespace App\Http\Controllers\api;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
 	use App\Models\api\apk_versionModel;
    use DB;
	use Session;
	use Validator;
    use Illuminate\Support\Str;
// namespace App\Http\Controllers\api;
// use Illuminate\Support\Facades\Redirect;
// //use App\Http\Controllers\api\Controller;
// //use Illuminate\Http\Request;
// //namespace App\Http\Requests\api;

// use Illuminate\Foundation\Http\FormRequest;


// use App\Http\Requests\api\CustomRequest;
// use Illuminate\Http\Request;
// use Session;
// use SimpleXMLElement;
// use DB;
//use App\Http\Controllers\api\Controller;
//use App\Http\Controllers\Controller;
error_reporting(0);
use Hash;
class LoginController extends Controller
{
    
    public function index(Request $request){
     
        // Get the username and password from the request
        $username = $request->input('username');
        $password = $request->input('password');

        $rules=array(
            'username' => 'required',
            'password' => 'required',
            
        );
        $messages=array(
        'username.required' => 'username required.',
        'password.required' => 'password required.',
        
        );

           $validator=Validator::make($request->all(),$rules,$messages);
                if($validator->fails())
                    {
                        if (empty($request->username)) {
                            $username_err  = 'username required';
                       }
                       if (empty($request->password)) {
                        $password_err  = 'password required';
                        }
                       
                        $response['status_code'] = "100";
                        $response['message']     = $username_err.' '.$password_err;
                        
                        
                      
                        echo json_encode($response);
                        exit;
                    }
      //  DB::enableQueryLog();
        // Check if the provided credentials are valid
        $user = DB::table('users')->where('email', $username)->first();

            if(!$user || !Hash::check($password, $user->password)){
                return response()->json([
                    'status_code' => '100',
                    'message' => 'Invalid username or password',
                  
                ]);
                } else {
                  
                    $user_data = DB::table('users')->where('id',$user->id)->update(['remember_token' => Str::random(32)]);
                    $user = DB::table('users')->where('id',$user->id)->first();
                   
                    
                    return response()->json([
                    'status_code' => '200',
                    'message' => 'Login Successfully',
                    'user' => $user
                ]);
            }

       
    }
    
     public function enquiryFormsData(Request $request){
         $id = $request->id;
        //$birthCertificate = birthCertificate::where('id',$id)->all();
        return response($id, 200);
    }

    
    
  

            

   
   
    
}