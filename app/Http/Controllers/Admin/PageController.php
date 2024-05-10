<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function signin()
    {
        return view("admin.pages.sign-in-static");
    }

    public function signup()
    {
        return view("admin.pages.sign-up-static");
    }
    public function gamesetting()
    {
        return view("admin.pages.gamesetting");
    }

     public function GameSettingupdate(Request $request)
    {
       
        
        $general = gs();
        $general->game_setting = $request->game_setting ?? 0;
        $general->save();
       
        $notify[] = ['success', 'General setting updated successfully'];
        return back()->withNotify($notify);
    }
}
