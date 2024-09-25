<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\warehouse;
use Illuminate\Http\Request;

class warehousecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = warehouse::all();



        if (count($data) == 0) {
            return view("warehouse")->with("data", "error");
        } else {
            return view("warehouse")->with("data", $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $data = $req->validate([
            "title" => "min:3|max:255|required",
            "price" => "min:1|max:4|required",
            "file" => "required"
        ]);


        $filename = rand(0, 1000) . "." . $req->file->extension();

        $req->file->move(public_path("/images"), $filename);

        $stock = rand(1, 200);




        $stock = rand(1, 200);

        $warehouse = new warehouse();

        $warehouse->title = $data["title"];
        $warehouse->price = $data["price"];
        $warehouse->file = $filename;

        $warehouse->stock = $stock;


        $warehouse->save();

        $product = new product();
        $product->title = $data["title"];
        $product->stock = 0;
        $product->price = $data["price"];
        $product->Is = false;
        $product->file = $filename;

        $product->save();

        return redirect()->route("warehouse");
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

        $warehousedata = warehouse::find($id);


        $stockvalue2 = $request->stockvalue;
        $stock2 = $request->stock;
        $stockdata = $stockvalue2 -= $stock2;
        if ($stockdata <= 0) {
            $productupdate = product::find($id);
            $productupdate->stock += $request->stockvalue;
            $productupdate->Is = true;
            $productupdate->save();
            $stockdata = 0;
            $warehousedata->stock = $stockdata;
            $warehousedata->save();
        } else {
            $productupdate = product::find($id);
            $productupdate->stock += $stock2;
            $productupdate->Is = true;
            $productupdate->save();
            $warehousedata->stock = $stockdata;
            $warehousedata->save();
        }

        return  redirect()->route("warehouse");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        warehouse::find($id)->delete();

        return redirect()->route("warehouse");
    }
}
