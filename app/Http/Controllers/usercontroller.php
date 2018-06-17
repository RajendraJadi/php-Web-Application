<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function show($id)
    {
        //return view('welcome');
        //return view('user.profile', ['user' => User::findOrFail($id)]);
    	return "this is user". $id;
    }
}
