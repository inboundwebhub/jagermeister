<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
      
        return redirect()->route('playgame');
    }
    public function playGame(){
         $pageTitle = 'Play Game';
         return view('gameview',compact('pageTitle'));
    }
    
    
}
