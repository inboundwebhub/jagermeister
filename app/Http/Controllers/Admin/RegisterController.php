<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for avatar file(name=avtar)
        ]);
        $user = User::create($attributes);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            // Assuming you have an $user variable for the user being registered
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        auth()->login($user);
        toastr()->success('sign in successfully');
    
        return redirect('/admin/dashboard');
    }
}
