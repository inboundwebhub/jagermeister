<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Prize;
use App\Models\prize_user;
use App\Models\LivePrize;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard()
    {
        $userCount = User::count(); // Count all users

        $prizeCount = Prize::count();

        $liveprizeCount =  Prize::whereNotNull('id')
            ->whereNotNull('prize_number')
            ->whereNotNull('prize_type')
            ->count();

        $prizeuserCount = User::whereNotNull('id')
            ->whereNotNull('prize_id')
            ->count();

        $pageTitle = 'Dashboard';
        
        return view('admin.pages.dashboard', compact('pageTitle', 'userCount', 'prizeCount', 'liveprizeCount', 'prizeuserCount'));
    }
}
