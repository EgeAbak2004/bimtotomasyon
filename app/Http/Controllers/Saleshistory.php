<?php

namespace App\Http\Controllers;

use App\Models\_sales_user;
use App\Models\sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Saleshistory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = sales::with("salesuser")->get();

        $total = 0;


        foreach ($data as $key => $value) {
            if ($value->salesuser->email == Auth::user()->email) {

                $total += $value->price * $value->stock;
            }
        }

        if (count($data) == 0) {
            return view("Saleshistory")->with("data", "error")->with("total", $total);
        } else {
            return view("Saleshistory")->with("data", $data)->with("total", $total);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = "")
    {
        $user = User::find(Auth::user()->id);
        $price = $user->price -= $request->total;
        if ($price < 0) {
            $user->price = Auth::user()->price;
            $user->save();

            return redirect()->route("history");
        } else if ($price == 0 || $price > 0) {
            $user->save();
            _sales_user::where("email", $request->email)->delete();

            return redirect()->route("history");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sales::find($id)->delete();

        return redirect()->route("history");
    }
}
