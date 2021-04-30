<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->user_type == '1' && Auth::user()->status == '1' && Auth::user()->is_approved == '1') {
            return redirect()->route('admin.dashboard');
        }
        elseif(Auth::user()->user_type == '2' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
            return redirect()->route('worker.dashboard');
        }
        elseif(Auth::user()->user_type == '3' && Auth::user()->status == '1' && Auth::user()->is_approved == '1'){
            return redirect()->route('client.dashboard');
        }
        else{
            return view('home');
        }
    }

}
