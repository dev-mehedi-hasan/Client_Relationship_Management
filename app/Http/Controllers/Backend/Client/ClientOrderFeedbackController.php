<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientOrderFeedbackController extends Controller
{

    public function dashboard(){
        $Order = Order::with('review')->latest()->where('client_id', Auth::user()->id)->where('status', 4)->paginate(10);
        return view('backend.client.order.feedback.index', compact('Order'));
    }

    // Order Feedback
    public function orderFeedback($id){
        $Orders = Order::findOrFail($id);
        if ($Orders->review != NULL) {
            $notification = array(
                'message'    => 'Order feedback already exits.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        } else {
            return view('backend.client.order.feedback.feedback', compact('Orders'));
        }
        
    }

    public function feedbackStore(Request $request, $id){
       
        $request->validate([
            'rating'  => 'required',
            'comment' => 'required|string|max:200'
        ]);

        $order = Order::findOrFail($id);
        $user = Auth::user();
        
        $review = OrderReview::create([
            'order_id'  => $order->id,
            'client_id' => $user->id,
            'rating'    => $request->get('rating'),
            'comment'   => $request->get('comment')
        ]);

        if($review->save()){
            $notification = array(
                'message'    => 'Order feedback success.',
                'alert-type' => 'success'
            );
    
            return redirect()->route('client.order.feedback')->with($notification);
        }

    }

}
