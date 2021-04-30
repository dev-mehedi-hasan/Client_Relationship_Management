<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Models\DeliveryImage;
use App\Models\Invoice;
use App\Models\Order;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use Zip;

class WorkerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = Order::with('specification','client')->where('worker_id', Auth::user()->id)->first();
        $MyOrders = Order::with('specification','client')->where('worker_id', Auth::user()->id)->paginate(5);
        return view('backend.worker.order.order', compact('MyOrders','orderDetails'));
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
        $DeliveryImage = DeliveryImage::where('order_id', $id)->get();
        $OrderDetails = Order::with('specification','client')->findOrFail($id);
        $Order_Id = Order::where('worker_id', Auth::user()->id)->first();
        $Order = Order::with('specification','client')->where('worker_id', Auth::user()->id)->paginate(5);
        return view('backend.worker.order.order-details', compact('OrderDetails','Order','DeliveryImage','Order_Id'));
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

    /**
     * @param int $id
     * order wise image download all
     */

    public function imageDownload($id){
        $images = Order::with('orderImage')->findOrFail($id);

        $zip = new ZipArchive();
        $fileName = $images->order_id.'.zip';

        if ($zip->open(public_path('assets/download-zip/'.$fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('assets/images/order_image'));

            foreach($images->orderImage as $allImage){

                foreach($files as $value){

                    if (basename($value) == $allImage->image) {
                        $relativeNameInZipFile = basename($value);
                        $zip->addFile($value,$relativeNameInZipFile);
                    }
                }
            }

            $zip->close();
            return response()->download(public_path('assets/download-zip/'.$fileName))->deleteFileAfterSend(true);

        }

    }

    /**
    * @param int $id
    * order wise file submit
    */
    public function deliveryImage(Request $request, $id){

        $OrderId = Order::findOrFail($id);
        // client order image count
        $orderImageCount = Order::findOrFail($id)->orderImage->count();
        // delivery image count
        $deliveryImageCount = DeliveryImage::where('order_id', $id)->count();
        // upload image count
        $photo = $request->file('photos');
        $file = $request->file('zip_file');

        if (!isset($photo) && !isset($file)) {
            session()->flash('deliveryField', 'Delivery upload field is required');
            return back();
        }
        elseif(isset($photo) && !isset($file)){
            // image upload request 
            if($deliveryImageCount || $deliveryImageCount == NULL) {

                $uploadImageCount = count($photo);
                $totalDeliveryImageCount =  $uploadImageCount + $deliveryImageCount;

                if ($totalDeliveryImageCount <= $orderImageCount) {
                    if(isset($photo) != NULL){
                        foreach($photo as $images){
                            $image =  $images->getClientOriginalName();
                            $images->move(public_path('assets/orderunzip/'.$OrderId->order_id), $image);
                            DeliveryImage::create([
                                'order_id'  =>  $id,
                                'delivery_image'  =>  $image,
                                'delivery_date' =>  Carbon::now()
                            ]);
                        }
                        if($totalDeliveryImageCount == $orderImageCount){
                            Order::findOrFail($id)->update([
                                'status'    =>  4
                            ]);

                            Invoice::where('order_id',$id)->update(['worker_id' =>  Auth::user()->id]);

                            $notification = array(
                                'message'   =>  'Order delivery complete successfull',
                                'alert-type'    =>  'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                        else{
                            $notification = array(
                                'message'   =>  'Order delivery successfull',
                                'alert-type'    =>  'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                    }
                    else{
                        $request->validate([
                            'photos'  =>  'required|mimes:jpg,png,jpeg,'
                        ]);
                    }
                }
                else{
                    session()->flash('orderImage', 'Order image greater than is '.$orderImageCount .' upload image less than '.$uploadImageCount.' ');
                    return redirect()->back();
                }
            }
        } 
        elseif(isset($file) && !isset($photo)){
            // zip file image upload
            $file_name = $OrderId->order_id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('assets/orderunzip/'.$OrderId->order_id),$file_name);

            // zip image file extract
            $zip = Zip::open(public_path('assets/orderunzip/'.$OrderId->order_id.'/'.$file_name));
            $zip->extract(public_path('assets/orderunzip/'.$OrderId->order_id),$file_name);
            $zip->close();

            // zip file delete
            $imageUnlink = unlink(public_path('assets/orderunzip/'.$OrderId->order_id.'/').$file_name);

            if ($imageUnlink) {
                // extract image upload in database
                $image = File::files(public_path('assets/orderunzip/'.$OrderId->order_id));
                if($deliveryImageCount || $deliveryImageCount == NULL) {

                    $zipFileImageCount = count($image);
                    $totalDeliveryImageCount =  $zipFileImageCount + $deliveryImageCount;
                    if ($totalDeliveryImageCount <= $orderImageCount) {
                        foreach ($image as $file) {
                            $images = $file->getRelativePathname();
                            DeliveryImage::create([
                                'order_id'  =>  $id,
                                'delivery_image'  =>  $images,
                                'delivery_date' =>  Carbon::now()
                            ]);
                        }

                        if($totalDeliveryImageCount == $orderImageCount){
                            $orders = Order::findOrFail($id)->update([
                                'status'    =>  4
                            ]);

                            $notification = array(
                                'message'   =>  'Order delivery complete successfull',
                                'alert-type'    =>  'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                        else{
                            $notification = array(
                                'message'   =>  'Order delivery successfull',
                                'alert-type'    =>  'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                    }
                    elseif($totalDeliveryImageCount > $orderImageCount){
                        foreach ($image as $file) {
                            $deleteImages = $file->getRelativePathname();
                            if ($orderImageCount > 0) {

                            }
                            else{
                                unlink(public_path('assets/orderunzip/'.$OrderId->order_id.'/').$deleteImages);
                            }

                        }
                        session()->flash('orderImage', 'Order image greater than is '.$orderImageCount .' upload image less than '.$zipFileImageCount.' ');
                        return redirect()->back();
                    }
                }
            }
        }
    }

}

