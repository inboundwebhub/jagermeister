<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class siteController extends Controller
{
    public function initial()
    {
        return view('initial-detail');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required|max:255|min:2',
            'lastname' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',   
        ]);

        $user = User::create($attributes);
       
        toastr()->success('sign in successfully');
    
        return redirect('/admin/dashboard');
    }
}
