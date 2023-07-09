<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Discount";
        $datas = Discount::all();
        return view("discount.index", compact("datas", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "List Discount Product";
        return view("discount.formCreate", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->name = $request->get("discountName");
        $discount->nominal = $request->get("discountValue");
        $discount->save();
        return redirect()->route("discount.index")->with("status", "Discount created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Discount::find($id);
        return view("discount.formEdit", compact("datas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discount = Discount::find($id);
        $discount->name = $request->get("discountName");
        $discount->nominal = $request->get("discountValue");
        $discount->save();
        return redirect()->route("discount.index")->with("status", "Discount updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Discount::find($id)->delete();
            return redirect()->route("discount.index")->with("status", "Delete success!");
        } catch (\PDOException $th) {
            $message = "Delete failed! Make sure discount isn't related to other data!";
            return redirect()->route("discount.index")->with("status", $message);
        }
    }

    public function applyDiscount(Request $request)
    {
        # code...
        $discounts = session()->get('discounts');
        $code = $request->input('kode');
        $disc = Discount::where('name', $code)->first();
        // dd($disc);
        $discounts["id"] = $disc->id;
        $discounts["name"] = $disc->name;
        $discounts["nominal"] = $disc->nominal;
        // dd($discounts);
        session()->put('discounts', $discounts);
        return redirect()->back()->with("success", "Berhasil tambah");
    }
}
