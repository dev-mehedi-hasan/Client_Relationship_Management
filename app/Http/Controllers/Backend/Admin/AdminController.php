<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Admin Dashboard
    public function dashboard(){
        $totalOrder = Order::all();
        $paidOrder = Order::whereNotIn('status', [2])->get();
        $recentOrder = Order::where('status', 1)->get();
        $completeOrder = Order::where('status', 4)->get();
        $pendingOrder = Order::where('status', 2)->get();
        $worker = User::whereNotIn('user_type', [2,1])->get();
        $workerActive = User::where('user_type', 3)->where('status', 1)->where('is_approved', 1)->get();
        $workerAwating = User::where('user_type', 3)->where('status', 1)->where('is_approved', 0)->get();
        return view('backend.admin.pages.dashboard', compact('recentOrder','totalOrder','completeOrder','pendingOrder','paidOrder','worker','workerActive','workerAwating'));
    }


}
