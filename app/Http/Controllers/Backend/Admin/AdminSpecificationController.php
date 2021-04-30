<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PopularSpecification = Order::with('specification')->select('spacification_id', DB::raw('COUNT(spacification_id) as specification_count'))->groupBy('spacification_id')->orderBy('specification_count', 'DESC')->get();
    
        $AllSpecification = Specification::with('user','alignment','file_type','background','color','margin','dpi','addon','size','custom_size')->get();
         return view('backend.admin.specification.specification', compact('AllSpecification','PopularSpecification'));
    }


    public function search(Request $request){

        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date'
        ],
        [
            'start_date.required' => 'From date field is required',
            'end_date.required'   => 'To date field is required'
        ]);
        /*  */
      
        $startDate = date('Y-m-d', strtotime($request->start_date));
        $endDate = date('Y-m-d', strtotime($request->end_date));
        if (Auth::check()) {
            // $PopulerSpecification = Order::with('specification')->select('spacification_id')->where('status','=',4)->groupBy('spacification_id')->get();
            $AllSpecification = Specification::where('created_at', '>=', $startDate)->where('updated_at','<=',$endDate)->get();
            return view('backend.admin.specification.specification', compact('AllSpecification', 'PopularSpecification'));
        }
        
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
        //
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
