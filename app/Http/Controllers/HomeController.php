<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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
                $products = Product::all();
                // $cart = session()->get('cart');
                // if (isset($cart)){
                //     dd($cart);
                // }
                return view('pembeli.index', compact("products"));
                break;
            case 'owner':
                $staff = User::where('role', '=', 'staff')->get();
                return view("owner.staffMenu", compact("staff"));
                break;
            case 'staff':
                $title = "List Product";
                $datas = Product::all();
                return view("product.index", compact("datas", "title"));
                break;
            default:
                # code...
                return view('home');
                break;
        }
    }
}
