<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailNote;
use App\Models\Note;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // // $cart = session()->get('cart');

        // return view('pembeli.index', compact("products"));
    }

    public function category()
    {
        $categories = Category::all();
        return view('pembeli.category', compact("categories"));
    }

    public function categoryByProduct(Request $request)
    {
        $products = Product::where('categories_id', $request->get("submit"))->get();
        return view('pembeli.index', compact("products"));
    }

    public function historyTransaksi()
    {
        $user_id = Auth::user()->id;
        // $history = DetailNote::with('product', 'note')->whereHas('note', function ($query) use ($user_id) {
        //     $query->where('Pembeli_id', $user_id);
        // })->get();

        $history = Note::with('details')->where('Pembeli_id', $user_id)->get();
        $note = [];
        for ($i = 0; $i < count($history); $i++) {
            $detail = [];
            for ($j = 0; $j < count($history[$i]->details); $j++) {
                array_push($detail, [
                    "details" => $history[$i]->details[$j],
                    "products" => Product::find($history[$i]->details[$j]->products_id)
                ]);
            }
            array_push($note, ["note_data" => $history[$i], "details_data" => $detail]);
        }
        return view("pembeli.history", compact("note"));
    }


    public function updateSaldo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->saldo = $user->saldo + $request->get("nominal");
        $user->save();
        return response()->json(["status" => "ok", "saldo" => $user->saldo], 200);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('pembeli.profile', compact("user"));
    }
}
