<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
        // dd($carts);
        $total = 0;
        foreach ($carts as $key => $cart) {
            $total += $cart["product"]->price * $cart["quantity"];
        }
        // dd($carts);
        $totalDisc = $total - ($total * $discounts["nominal"]);
        $sisaSaldo = $user->saldo - $totalDisc;
        if ($user->saldo - $totalDisc > 0) {
            //berhasil membeli barang

            // kurangi saldo user
            $user->saldo = $sisaSaldo;
            $user->save();

            // save note
            $note = new Note();
            $note->order_date = Carbon::now();
            $note->total = $totalDisc;
            $note->Pembeli_id = $user->id;
            $note->Discount_id = $discounts["id"];
            $note->save();

            foreach ($carts as $key => $cart) {
                DB::table('detail_notes')->insert([
                    'quantity' => $cart["quantity"],
                    'subTotal' => $cart["product"]->price * $cart["quantity"],
                    'products_id'=> $key,
                    'notes_id'=>$note->id,
                    // Add more columns and values as needed
                ]);
            }

            // display status
            Session::flash('status', 'Sukses membeli barang-barang!');
            Session::flash('alert-class', 'alert-success');

            session()->put('carts', null);
            session()->put('discounts', null);

            return redirect()->route("home");
        } else {
            // saldo kurang
            Session::flash("status", "Gagal membeli, saldo kurang!");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route("home");
        }

    }
}
