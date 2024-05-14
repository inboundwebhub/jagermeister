<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;;
use Illuminate\Http\Request;
use App\Models\User;

class PrizeUserController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('id')
        ->whereNotNull('prize_id')
        ->orwhereNotNull('voucher_id')
        ->get();
    // dd($Users);
        return view('admin.prize_user.index',compact('users'));
    }
}
