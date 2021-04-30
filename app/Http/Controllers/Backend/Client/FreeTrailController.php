<?php

namespace App\Http\Controllers\Backend\client;

use App\Http\Controllers\Controller;
use App\Models\FreeTrail;
use App\Models\FreeTrailImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreeTrailController extends Controller
{
    public function index(){
        return view('backend.client.freetrail.index');
    }

    public function create(){
        return view('backend.client.freetrail.form');
    }

    public function store(Request $request){
        $request->validate([
            'image'=>'required|mimes:png,jpg',
            'note_text'=>'required|max:200'
        ]);

        $FreeTrail = FreeTrail::create([
            'user_id'=>Auth::user()->id,
            'note_text'=>$request->note_text
        ]);
        
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            foreach ($image as $images) {
                $allImage = $images->getClientOriginalExtension();
                $images->move(public_path('assets/images/free_trails/'), $allImage);
                FreeTrailImage::create([
                    'freeTrail_id'=>$FreeTrail->id,
                    'image'=>$allImage
                ]);
            }
        }

        $notification = array(
            'message'=>'image upload successfull',
            'alert-type'=>'success'
        );
        return redirect()->route('client.freetrail.index')->with($notification);
       
    }

}

