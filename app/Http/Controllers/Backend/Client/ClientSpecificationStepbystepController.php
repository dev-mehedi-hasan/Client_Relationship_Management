<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Size_format_custom_row;
use App\Models\Specific_addon;
use App\Models\Specific_addon_row;
use App\Models\Specific_align_row;
use App\Models\Specific_alignment;
use App\Models\Specific_background;
use App\Models\Specific_background_row;
use App\Models\Specific_category;
use App\Models\Specific_color;
use App\Models\Specific_color_row;
use App\Models\Specific_dpi;
use App\Models\Specific_dpi_row;
use App\Models\Specific_file_row;
use App\Models\Specific_file_type;
use App\Models\Specific_margin_row;
use App\Models\Specific_size_format;
use App\Models\Specific_size_row;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientSpecificationStepbystepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Specific_category::latest()->get();
        $File_Type = Specific_file_type::latest()->get();
        $Background = Specific_background::latest()->get();
        $Alignment = Specific_alignment::latest()->get();
        $Color = Specific_color::latest()->get();
        $Dpi = Specific_dpi::latest()->get();
        $Addon = Specific_addon::latest()->get();
        $Size = Specific_size_format::latest()->get();

        return view('backend.client.specification.stepbystep.index', compact('Category','File_Type','Background','Alignment','Color','Dpi','Addon','Size'));
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
        if(!isset($request->category)){
            $notification = array(
                'message'   =>  'Please, Category select an item in the list',
                'alert-type'    =>  'error'
            );
            return redirect()->back()->with($notification);
        }
        // else if(!isset($request->size_format) ){
        //     $notification = array(
        //         'message'   =>  'Please, Size format select an item in the list',
        //         'alert-type'    =>  'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }
        else{

            $number = 000000;
            $workID = Specification::with('user')->orderby('id', 'DESC')->where('creator_id', 2)->first();
            if($workID == NULL){
                $Specification_id = 'CS-'. str_pad($number + 1, 6, 0, STR_PAD_LEFT);
            }
            else{
                $lastUserId = explode('CS-', $workID->specific_id);
                $lastId =  $lastUserId['1'];
                $Specification_id = 'CS-'. str_pad($lastId + 1, 6, 0, STR_PAD_LEFT);
            }

            // $number = 000000;
            // $Specification_id = 'CS-'. str_pad($number + 1, 6, 0, STR_PAD_LEFT);
            // Specification

            $Specification = Specification::create([
                'specific_id'   =>  $Specification_id,
                'creator_id'    =>  Auth::user()->id,
                'category_id'   =>  $request->category,
                'name'          =>  $request->specification_name
            ]);

            // File_Type_Row
            $file_type =  $request->file_type;
            if($file_type){
                foreach($file_type as $items){
                    Specific_file_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'file_id'  =>  $items
                    ]);
                }
            }

            // Background_Row
            $background =  $request->background;
            if($background){
                foreach($background as $items){
                    Specific_background_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'background_id'  =>  $items
                    ]);
                }
            }

            // Alignment_Row
            $align =  $request->alignment;
            if($align){
                foreach($align as $items){
                    Specific_align_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'align_id'  =>  $items
                    ]);
                }
            }

            // Color_Row
            $color =  $request->color;
            if($color){
                foreach($color as $items){
                    Specific_color_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'color_id'  =>  $items
                    ]);
                }
            }

            // Margin_Row
            $margin =  $request->margin;
            if($margin){
                foreach($margin as $items){
                    Specific_margin_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'margin'  =>  $items
                    ]);
                }
            }

            // Margin_Row
            $dpi =  $request->dpi;
            if($dpi){
                foreach($dpi as $items){
                    Specific_dpi_row::insert([
                        'specification_id'  =>  $Specification->id,
                        'dpi_id'  =>  $items
                    ]);
                }
            }


            if(isset($request->custom_size_format)){
                $size_id =  $request->custom_size_format;
                Size_format_custom_row::create([
                    'specification_id'  =>  $Specification->id,
                    'size_id'       =>  $size_id,
                    'value_1'       =>  $request->value_one,
                    'value_2'       =>  $request->value_two
                ]);

            }
             // Size_Row
             if(isset($request->size_format)){
                $size =  $request->size_format;
                if($size){
                    foreach($size as $items){
                        Specific_size_row::insert([
                            'specification_id'  =>  $Specification->id,
                            'size_id'  =>  $items
                        ]);
                    }
                }
            }


             // Addon_Row
             $addon =  $request->addon;
             if($addon){
                 foreach($addon as $items){
                     Specific_addon_row::insert([
                         'specification_id'  =>  $Specification->id,
                         'addon_id'  =>  $items
                     ]);
                 }
             }




            if($Specification && $file_type && $background && $align && $color){
                $notification = array(
                    'message'   =>  'Specification has been saved.',
                    'alert-type'    =>  'success'
                );

                return redirect()->route('client.specification-stepbystep.index')->with($notification);
            }

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
            'message'   =>  'view page not design ready',
            'alert-type'    =>  'error'
        );

        return redirect()->back()->with($notification);
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
