<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Billing_info;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class ClientAccountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Id = Auth::user()->id;
        $Client_info = User::findOrFail($Id);
        return view('backend.client.account.account', compact('Client_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Id = Auth::user()->id;

        // image upload
        if(empty($request->file('profile_image'))){
            $notification = array(
                'message'   =>  'Image field is required.',
                'alert-type'    =>  'error'
            );
            return redirect()->back()->with($notification);
        }

        if(Auth::user()->photo != NULL){
            $img = $request->file('profile_image');
            $images = Auth::user()->photo;
            Image::make($img)->resize(150, 150)->save(public_path('assets/images/profile/'.$images));
        }else{
            $img = $request->file('profile_image');
            $images = md5(uniqid().time()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(150, 150)->save(public_path('assets/images/profile/'.$images));
        }

        $update = User::findOrFail($Id)->update([
            'name'    =>  $request->first_name,
            'email'         =>  $request->user_email,
            'dob'           =>  $request->date_of_birth,
            'phone'         =>  $request->phone,
            'photo'         =>  $images
        ]);

        if($update){
            Billing_info::updateOrCreate( 
                ['user_id'   =>  $Id],
                [
                    'company_name' =>  $request->company_name, 'name'   =>  $request->first_name,
                    'email' =>  $request->email, 'phone'   =>  $request->phone,
                    'address_one'   =>  $request->address_one, 'address_two'    =>  $request->address_two,
                    'city'   =>  $request->city, 'postal_code'    =>  $request->postal_code,
                    'vat_number'   =>  $request->eu_vat_number, 'country'    =>  $request->country,
                ]
            );

            $notification = array(
                'message'   =>  'Your information has been successfully.',
                'alert-type'    =>  'success'
            );
            return redirect()->route('client.account.index')->with($notification);
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
        //
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
}
