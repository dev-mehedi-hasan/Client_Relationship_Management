<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('backend.profile.form', compact('user'));
    }

    // User Profile Update 
    public function profileUpdate(Request $request, $id){
        $user = Auth::user();
        $userId = User::findOrFail($id);
      
        $request->validate([
            'avatar' => 'nullable|image|mimes:png,jpg',
            'name'   => 'nullable|string',
            'phone'  => 'nullable|digits:11|unique:users,phone,'.$userId->id,
            'email'  => 'nullable|unique:users,email,'.$userId->id,
        ]);

        if ($userId->user_type != 1) {
            $userId->update([
                'name'  => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'dob'   => date('Y-m-d', strtotime($request->date_of_birth)),
            ]);

            $userId->profile()->update([
                'worker_id'   => $userId->id,
                'address_one' => $request->pasent_address,
                'address_two' => $request->parmanet_address,
                'postal_code' => $request->post_code,
                'country'     => $request->country,
                'city'        => $request->city,
            ]);

            if ($request->hasFile('avatar')) {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }
            
            $notification = array(
                'message'    => 'Profile updated successfull',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        } 
        else {
             $userId->update([
                'name'  => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'dob'   => date('Y-m-d', strtotime($request->date_of_birth)),
            ]);

            if ($request->hasFile('avatar')) {
                $userId->addMedia($request->avatar)->toMediaCollection('avatar');
            }

            $notification = array(
                'message'=>'Profile updated successfull',
                'alert-type'=>'success'
            );

            return back()->with($notification);
                       
        }

    }

    // // Password index 
    public function changePassword(){
        $user = Auth::user();
        return view('backend.profile.password', compact('user'));
    }

    // // Password update 
    public function passwordUpdate(Request $request){
        
        $request->validate([
            'current_password'  =>  'required|string',
            'new_password'=> 'required|string|min:8',
            'confirm_password'=>'required_with:new_password|same:new_password|min:8'
        ]);

        $hashPassword = Auth::user();
        if (Hash::check($request->current_password, $hashPassword->password)) {
            if (!Hash::check($request->new_password, $hashPassword->password)) {
                $hashPassword->update([
                    'password'  =>   Hash::make($request->new_password)
                ]);

                Auth::logout();
                return redirect()->route('login');
            }
            else{
                $notification = array(
                    'message'=>'New password can not be same as old password',
                    'alert-type'=>'warning'
                );
                return back()->with($notification);
            }
        }
        else{
            $notification = array(
                'message'=>'Current password not match',
                'alert-type'=>'warning'
            );
            return back()->with($notification);
        }
    }
}
