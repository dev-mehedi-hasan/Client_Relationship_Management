<?php

namespace App\Http\Controllers\Backend\Worker;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function clientReview($id){
        $order = Order::findOrFail($id);
        return view('backend.worker.pages.review', compact('order'));
    }
}
