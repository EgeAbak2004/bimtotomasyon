<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthControllerA extends Controller
{
    function create(Request $req)
    {

        $data = $req->validate([
            "name" => "max:60|min:3",
            "email" => "max:255|required",
            "password" => "confirmed"
        ]);

        $user = new User();

        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->price = rand(100, 1000);


        $user->save();


        Auth::login($user);

        return redirect()->route("home");
    }

    function login(Request $req)
    {
        $req->old("email", $req->email);
        $data = $req->validate([
            "email" => "max:255|required",
            "password" => ""
        ]);

        if (Auth::attempt($req->only("email", "password"), true)) {
            return redirect()->route("home");
        } else {
            return redirect()->route("loginview")->withInput();
        }
    }
}
