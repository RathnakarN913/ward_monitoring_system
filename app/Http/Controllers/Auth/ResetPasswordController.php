<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function changepassword(){
        if(Auth::user()->user_type='3'){
            return view('admin.pages.change-password');
        }else{
            return back();
        }
        
    }
    
    public function updatepassword(Request $request){
         if(Auth::user()->user_type='3'){
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);
            $oldPassword = $request->old_password;
            $currentPassword = Auth::user()->password;
            $newpassword = $request->new_password;
        //   dd($currentPassword);
            if (Hash::check($oldPassword, $currentPassword)) {
                $user = Auth::user();
                $user->password = Hash::make($newpassword);
                $user->show_pwd = $newpassword;
                $user->save();
                return back()->with('message','Password Updated Successfully');
                
            } else {
                $error =[
                    'alert-type'=>'error',
                    'message' => 'Old password is not matched with our records'
                ];
                return back()->with($error);
            }
            
            
        }else{
            return back();
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
