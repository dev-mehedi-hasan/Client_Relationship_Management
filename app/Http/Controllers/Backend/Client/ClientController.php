<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    
    public function dashboard(){
        $RecentOrder = Order::with('orderImage','specification','client')->latest()->where('client_id', Auth::user()->id)->where('status', 1)->paginate(5);
        return view('backend.client.pages.dashboard', compact('RecentOrder'));
    }


}
