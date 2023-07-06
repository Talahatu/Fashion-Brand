<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Type";
        $datas = Type::all();
        // dd(Type::all());
        return view("type.index", compact("datas", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "List Type";
        return view("type.formCreate", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type();
        $type->name = $request->get("typeName");
        $type->save();
        return redirect()->route("type.index")->with("status", "Type updated!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Type::find($id);
        // dd($datas);
        return view("type.formEdit", compact("datas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = Type::find($id);
        $type->name = $request->get("typeName");
        $type->save();
        return redirect()->route("type.index")->with("status", "Type created!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Type::find($id)->delete();
            return redirect()->route("type.index")->with("status", "Delete success!");
        } catch (\PDOException $th) {
            $message = "Delete failed! Make sure type isn't related to other data!";
            return redirect()->route("type.index")->with("status", $message);
        }
    }
}
