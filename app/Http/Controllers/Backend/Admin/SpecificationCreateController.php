<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specification;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecificationCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Specification = Specification::with('category','alignment','file_type','background','color','margin','dpi','addon','size')->latest()->where('creator_id', 1)->paginate(4);
        return view('backend.admin.specification.index-market-specification', compact('Specification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Specific_category::latest()->get();
        $File_Type = Specific_file_type::latest()->get();
        $Background = Specific_background::latest()->get();
        $Alignment = Specific_alignment::latest()->get();
        $Color = Specific_color::latest()->get();
        $Dpi = Specific_dpi::latest()->get();
        $Addon = Specific_addon::latest()->get();
        $Size = Specific_size_format::latest()->get();

        return view('backend.admin.specification.create-market-specification', compact('Category','File_Type','Background','Alignment','Color','Dpi','Addon','Size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_type' =>  'required',
            'background' =>  'required',
            'alignment' =>  'required',
            'color'     =>  'required',
            'margin'    =>  'required',
            'dpi'       =>  'required',
            'category_name' =>  'required',
            'specification_name'    =>  'required',
            'addon'     =>  'required',
            'size'      =>  'required'
        ]);

        $Specification = Specification::create([
            'creator_id'    =>  Auth::user()->id,
            'name'  =>  $request->specification_name,
            'category_id'   =>  $request->category_name
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

          // Size_Row
          $size =  $request->size;
          if($size){
              foreach($size as $items){
                Specific_size_row::insert([
                      'specification_id'  =>  $Specification->id,
                      'size_id'  =>  $items
                  ]);
              }
          }

        if($Specification && $file_type && $background && $align && $color && $margin){
            $notification = array(
                'message'   =>  'Specification saved successfull.',
                'alert-type'    =>  'success'
            );

            return redirect()->route('admin.specifications.index')->with($notification);
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
