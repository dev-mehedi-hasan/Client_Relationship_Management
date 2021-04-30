<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing_info;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserRegisterController extends Controller
{
    public function registerAuth(Request $request){

        $request->validate([
            'email' =>  'required|email|unique:users,email',
            'password'  =>  'required|min:8',
            'confirm_password'  =>  'required_with:password|same:password|min:8',
            // 'g-recaptcha-response'  =>  'required'
        ]);

        if(isset($request->user_type)){
            if ($request->user_type == "worker") {
                $number = 000000;
                $workID = User::orderby('id', 'DESC')->where('user_type', 2)->first();
                if($workID == NULL){
                    $user_id = 'WK-'. str_pad($number + 1, 6, 0, STR_PAD_LEFT);
                }
                else{
                    $lastUserId = explode('WK-', $workID->user_id);
                    $lastId =  $lastUserId['1'];
                    $user_id = 'WK-'. str_pad($lastId + 1, 6, 0, STR_PAD_LEFT);
                }
                $user_type = '2';
                $is_approved = '0';
            }
            elseif($request->user_type == "client"){
                $number = 000000;
                $workID = User::orderby('id', 'DESC')->where('user_type', 3)->first();
                if($workID == NULL){
                    $user_id = 'CL-'. str_pad($number + 1, 6, 0, STR_PAD_LEFT);
                }
                else{
                    $lastUserId = explode('CL-', $workID->user_id);
                    $lastId =  $lastUserId['1'];
                    $user_id = 'CL-'. str_pad($lastId + 1, 6, 0, STR_PAD_LEFT);
                }
                $user_type = '3';
                $is_approved = '1';
            }
            else{
                echo "Something went wrong";
            }

        }

        $Register = User::create([
            'user_id'   =>  $user_id,
            'email' =>  $request->email,
            'phone' =>  $request->phone_number,
            'password'  => Hash::make($request->password),
            'user_type' =>  $user_type,
            'is_approved'   =>  $is_approved,
            'status'        =>  '1'
        ]);

        if($Register->user_type == 2){
            Profile::create([
                'worker_id'   =>  $Register->id
            ]);
        }
        elseif($Register->user_type == 3){
            Billing_info::create([
                'user_id'   =>  $Register->id
            ]);
        }

        Mail::send('sendmail.register',[
            'email'  => $request->email,
        ],function($mail)use($request){
            $mail->from('sujon.d.elite@gmail.com','Dclipping');
            $mail->to($request->email)->subject('Thank Your Register');
        });

        if ($Register) {
            $notification = array(
                'message'   =>  'Register successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('login')->with($notification);
        }

    }
}






