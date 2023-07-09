<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize("pembeli-permission", Auth::user());
        $user = User::with('notes')->find(Auth::user()->id);
        $history = $user->notes();
        return view('pembeli.history', compact("history"));
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }

    public function checkout()
    {
        # code...
        $discounts = session()->get('discounts');
        $carts = session()->get('carts');
        $user = auth()->user();

        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart["product"]->price * $cart["quantity"];
            $product = Product::find($key);
            // dd($product);
            if ($product->stock < $cart["quantity"]) {
                Session::flash("status", "Gagal membeli, stock barang kurang!");
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route("home");
            }
        }
        // dd($carts);
        $totalAll = 0;
        $totalDisc = 0;
        if ($discounts != null && count($discounts) > 0) {

            if (isset($discounts["poin"])) {
                $totalDisc += (10000 * $discounts["poin"]);
            }
            if (isset($discounts["nominal"])) {
                $totalDisc += ($total * $discounts["nominal"]);
            }
            $totalAll = $total - $totalDisc;

        } else {
            $totalAll = $total;
        }

        $totalAllPajak = $totalAll * 1.11; // pajak 11%
        // dd($totalAllPajak);
        $sisaSaldo = $user->saldo - $totalAllPajak;
        if ($user->saldo - $totalAllPajak > 0) {
            //berhasil membeli barang
            $points = 0;

            if ($user->membership == 1 && !isset($discounts["poin"])) {
                $points = floor($totalAll / 100000);
                $user->poin += $points;
            } else if (isset($discounts["poin"]) && $total > 100000) {
                // dd(isset($discounts["poin"]));
                $user->poin = 0;
            }
            // kurangi saldo user
            $user->saldo = $sisaSaldo;
            $user->membership = 1;
            // dd($user);
            $user->save();

            $disc_id = null;
            if (isset($discounts["id"])) {
                $disc_id = $discounts["id"];
            }

            if ($totalAllPajak <= 0){
                $totalAllPajak = 0;
            }

            // save note
            $note = new Note();
            $note->order_date = Carbon::now();
            $note->total = $totalAllPajak;
            $note->Pembeli_id = $user->id;
            $note->Discount_id = $disc_id;
            $note->save();

            foreach ($carts as $key => $cart) {
                $product = Product::find($key);
                $product->stock -= $cart["quantity"];
                $product->save();
                DB::table('detail_notes')->insert([
                    'quantity' => $cart["quantity"],
                    'subTotal' => $cart["product"]->price * $cart["quantity"],
                    'products_id' => $key,
                    'notes_id' => $note->id,
                    // Add more columns and values as needed
                ]);
            }
            $detail_notes = DB::table('detail_notes')->where('notes_id', $note->id)->get();
            $struk = [];
            foreach ($detail_notes as $key => $detail_note){
                // dd($detail_note->products_id);
                $product = Product::find($detail_note->products_id);
                $item = ["name"=>$product->name, "quantity"=>$detail_note->quantity, "subtotal"=>$detail_note->subTotal];
                array_push($struk, $item);
            }
            // dd($struk);
            // display status
            // Session::flash('status', 'Sukses membeli barang-barang!');
            // Session::flash('alert-class', 'alert-success');

            session()->put('carts', null);
            session()->put('discounts', null);

            return view('pembeli.struk', compact("struk", "total", "totalDisc"));
            // return redirect()->route("home");
        } else {
            // saldo kurang
            Session::flash("status", "Gagal membeli, saldo kurang!");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route("home");
        }

    }

    public function struk()
    {
        # code...
        return view('pembeli.struk');
    }
}
