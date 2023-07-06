<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = User::where('role','=','staff')->get();
        return view("owner.staffMenu",compact("staff"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("owner.staffCreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newStaff=new User();
        $newStaff->name = $request->get("inputName");
        $newStaff->email = $request->get("inputEmail");
        $newStaff->password = Hash::make($request->get("inputPassword"));
        $newStaff->role = "staff";
        $newStaff->poin = 0 ;
        $newStaff->membership = 0;
        $newStaff->save();
        return redirect()->route("staff.index")->with("status","Staff Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view("owner.staffEdit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->get("inputName");
        $data->email = $request->get("inputEmail");
        $data->save();
        return redirect()->route("staff.index")->with("status","Staff Edited");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route("staff.index")->with("status", "Delete success!");
        } catch (\PDOException $th) {
            $msg = "Delete failed! Make sure product isn't related to other data!";
            return redirect()->route("staff.index")->with("status", $msg);
        }
    }
}
