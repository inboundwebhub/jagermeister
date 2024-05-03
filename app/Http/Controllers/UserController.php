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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ]);

        // If validation fails, return with validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $params = $request->all();
        $data   = array();
        $data['name']        = $params['first_name'].' '.$params['last_name'];
        $data['email']       = $params['email'];
       
        $User = User::create($data);
        if ( $User ){
             return redirect()->route('playgame');
        } else {
            return response()->json(['error' => array('failed' =>  __('Something went wrong please try again.') )]);  
        }  

    }
    public function playGame(){
        $pageTitle = 'Play Game';
        return view('gameview',compact('pageTitle'));
    }
}
