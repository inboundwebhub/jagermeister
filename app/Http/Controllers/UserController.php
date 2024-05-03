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
        $headers = "From: 'testing' <'jaydeep.inboundwebhub@gmail.com'> \r\n";
        $headers .= "Reply-To: 'testing' <''jaydeep.inboundwebhub@gmail.com''> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail('jaydeep.inboundwebhub@gmail.com', 'testing','testing', $headers);
         $pageTitle = 'Play Game';
         return view('gameview',compact('pageTitle'));
    }
    
    
}
