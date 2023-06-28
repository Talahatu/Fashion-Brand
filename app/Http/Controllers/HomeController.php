<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // testing
        $testing = "testing";
        // Role Access
        switch (Auth::user()->role) {
            case 'pembeli':
                # code...
                break;
            case 'owner':
                # code...
                break;
            case 'staff':
                # code...
                break;
            default:
                # code...
                dd("Ngawur");
                break;
        }
        // dd(Auth::user()->role == "pembeli");
        return view('home');
    }
}
