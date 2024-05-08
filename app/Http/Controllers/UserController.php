<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',  
        ]);

        // If validation fails, return with validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $params = $request->all();
        $data   = array();
        $data['name']        = $params['firstname'].' '.$params['lastname'];
        $data['email']       = $params['email'];
        // dd($data);
       
        $User = User::create($data);
        if ( $User ){
            return redirect()->route('playgame');
        } else {
            return response()->json(['error' => array('failed' =>  __('Something went wrong please try again.') )]);  
        }  

    }
    public function playgame(){
        return view('gameview');
    }
}
