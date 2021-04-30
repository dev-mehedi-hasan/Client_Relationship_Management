<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Billing_info;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Order_image;
use App\Models\Payment;
use App\Models\Specification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use File;

class ClientOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Order = Order::with('orderImage')->latest()->get();
        return view('backend.client.order.index', compact('Order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Id = Auth::user()->id;
        $Client_info = User::findOrFail($Id);
        $Specification = Specification::with('category','alignment','file_type','background','color','margin','dpi','addon','size')->latest()->where('creator_id', 2)->get();
        return view('backend.client.order.create', compact('Specification','Client_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(isset($request->select_specification) == Null){
            $notification = array(
                'message'    => 'Select Specification',
                'alert-type' => 'error'
            );;

            return redirect()->back()->with($notification);
        }elseif(empty($request->photos)){
            $notification = array(
                'message'    => 'Please image select now',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        elseif(empty($request->payment)){
            $notification = array(
                'message'    => 'Payment option required',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $specification = explode(',',$request->select_specification);
        // specification id
        $select_specification = $specification[0];
        // specification price
        $select_specification_price = $specification[1];

        // order id genered
        $number = 000000;
        $Order = Order::orderby('id', 'DESC')->first();
        if($Order == NULL){
            $order_id = 'OR'. str_pad($number + 1, 6, 0, STR_PAD_LEFT);
        }
        else{
            $lastOrderId = explode('OR', $Order->order_id);
            $lastId =  $lastOrderId['1'];
            $order_id = 'OR'. str_pad($lastId + 1, 6, 0, STR_PAD_LEFT);
        }

        // payment check
        if(isset($request->payment) != NULL){
           $status = 1;
        }else{
            $status = 2;
        }

        if($img = $request->file('photos')){
            $total_image = count($img);
            $total_price = $select_specification_price * $total_image;
        }

        // hours to date convert
        $mytime = $request->delivery_date;
        $day = $mytime/24;
        $now = Carbon::now();
        $delivery_date = $now->addDay($day)->format('y-m-d h:i:s');

        $Order = Order::create([
            'order_name'       => $request->order_name,
            'order_id'         => $order_id,
            'client_id'        => Auth::user()->id,
            'order_date'       => Carbon::now(),
            'delivery_date'    => $delivery_date,
            'spacification_id' => $select_specification,
            'status'           => $status,
            'price'            => $total_price
        ]);

        $serial=1;
        foreach($img as $images){
            $image = $Order->order_id.'-'.$serial++.'.'.$images->getClientOriginalExtension();
            $images->move(public_path('assets/images/order_image/'), $image);
            Order_image::create([
                'order_id' => $Order->id,
                'image'    => $image
            ]);
        }

        $Billing_info = Billing_info::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'user_id'      => Auth::user()->id,
                'company_name' => $request->company_name, 'email'       => $request->email,
                'phone'        => $request->phone,        'address_one' => $request->address_one,
                'address_two'  => $request->address_two,  'city'        => $request->city,
                'postal_code'  => $request->postal_code,  'vat_number'  => $request->city,
                'country'      => $request->country,
            ]
        );

        $Payment = Payment::create([
            'order_id'       => $Order->id,
            'card_number'    => $request->card_number,
            'month'          => $request->month,
            'year'           => $request->year,
            'cvv'            => $request->cvv,
            'payable'        => $total_price,
            'paid_amount'    => $total_price,
            'payment_method' => 'Credit Card'
        ]);

        $Invoice_id = 'DTI-' . random_int(000000, 999999);
        $Invoice = Invoice::create([
            'invoice_id'   =>   $Invoice_id,
            'order_id'     =>   $Order->id,
            'payment_id'   =>   $Payment->id,
            'invoice_date' =>   Carbon::now(),
            'client_id'    =>   Auth::user()->id
        ]);

        if($Order && $Billing_info && $Payment && $Invoice){
            $notification = array(
                'message'    => 'Your order successfull',
                'alert-type' => 'success'
            );
            return redirect()->route('client.order.index')->with($notification);
        }
        else{
            $notification = array(
                'message'    => 'Pleace! your order someting wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
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
        $OrderDetails = Order::with('specification','client')->findOrFail($id);
        $Order = Order::with('specification','client')->where('client_id', Auth::user()->id)->paginate(5);
        return view('backend.client.order.order-details', compact('OrderDetails','Order'));
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

    // Delivery image download request 
    public function deliveryImageDownload($id){
        $images = Order::with('deliveryImage')->findOrFail($id);

        $zip = new ZipArchive();
        $fileName = $images->order_id.'.zip';

        if ($zip->open(public_path('assets/orderunzip/'.$fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('assets/orderunzip/'.$images->order_id));
            foreach($images->deliveryImage as $allImage){
                foreach($files as $value){
                    if (basename($value) == $allImage->delivery_image) {
                        $relativeNameInZipFile = basename($value);
                        $zip->addFile($value,$relativeNameInZipFile);
                    }
                }
            }

            $zip->close();
            return response()->download(public_path('assets/orderunzip/'.$fileName))->deleteFileAfterSend(true);
        }
    }
}
