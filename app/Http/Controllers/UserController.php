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
use Illuminate\Support\Facades\Cookie;


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
            Cookie::queue('userData', json_encode($User), 30 * 24 * 60); // Cookie expires in one month

            return redirect()->route('playgame');
        } else {
            return response()->json(['error' => array('failed' =>  __('Something went wrong please try again.') )]);  
        }  

    }
    public function playgame(){
        return view('gameview');
    }

    public function delete(Request $request)
    {

        if ($request->ajax()) {
            $cookieName = 'userData';
            if ($request->hasCookie($cookieName)) {
                $userData = $request->cookie('userData');
                $userDataArray = json_decode($userData,true);
                $userId = (isset($userDataArray['id']) &&  $userDataArray['id'] !="") ? $userDataArray['id'] : '';
                $typeData = $request->input('typeData');
                $cookie = cookie()->forget($cookieName);
                if($userId !="") {
                    $pointData = array('type'=>$typeData,'user_id'=>$userId);
                    Cookie::queue('pointtype', json_encode($pointData), 24 * 60);
                }
                return response()->json(['message' => 'Cookie deleted successfully'])->withCookie($cookie);
            }
            return response()->json(['message' => 'Cookie not found'], 404);
        }
        return response()->json(['message' => 'Invalid request'], 400);
    }
}
