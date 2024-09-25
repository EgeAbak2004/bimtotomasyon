<?php

namespace App\Http\Controllers;

use App\Models\_sales_user;
use App\Models\product;
use App\Models\sales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::all();
        if (count($product) == 0) {
            return view("sales")->with("data", "error");
        } else {
            return view("sales")->with("data", $product);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {




        if (!Auth::guest() && gettype($req->Take) != "String") {
            $product = product::with("product")->find($req->id);

            if ($product->stock > 0) {
                $stocknumber = $product->stock -= $req->Take;
                if ($stocknumber <= 0) {
                    $stocknumber = 0;
                }
                $productnew =  product::find($req->id);
                $productnew->stock = $stocknumber;
                $productnew->save();

                echo $req->id;

                $salesuser = new _sales_user();

                $salesuser->name = Auth::user()->name;
                $salesuser->email = Auth::user()->email;
                $salesuser->password = "";
                $salesuser->save();

                $sale = new sales();
                $sale->title = $product->title;
                $sale->price = $product->price;
                $sale->file = $product->file;
                $sale->stock = $req->Take;
                $sale->save();
                return  redirect()->route("sales");
            } else {
                return redirect()->route("sales");
            }
        } else {
            return redirect()->route("home")->with("no", true);
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
