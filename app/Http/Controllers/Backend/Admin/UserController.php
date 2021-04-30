<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Profile;
use App\Models\Billing_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::latest()->where('status', 1)->get();
        return view('backend.admin.pages.user-record', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.pages.user-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->user_type)){
            if ($request->user_type === "worker") {
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
            elseif($request->user_type === "client"){
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

        if ($Register) {
            $notification = array(
                'message'   =>  'User added successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('admin.users.index')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = array(
            'message'   => 'User view page does not design.',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    // User Deactived
    public function deactivedUser($id){
        $Deactived = User::findOrFail($id)->update([
            'is_approved'   =>  0
        ]);

        if($Deactived){
            $notification = array(
                'message'   =>  'Account Deactived successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('admin.users.index')->with($notification);
        }

    }

    // User Actived
    public function activedUser($id){
        $Actived = User::findOrFail($id)->update([
            'is_approved'   =>  1
        ]);

        if($Actived){
            $notification = array(
                'message'   => 'Account Actived Successfull.',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.users.index')->with($notification);
        }
    }






}
