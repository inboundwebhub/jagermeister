<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Models\LivePrize;
use Illuminate\Http\Request;

class LivePrizeController extends Controller
{
    public function index()
    {
        // LivePrize::truncate();

        $livePrizes = Prize::whereNotNull('id')
            ->whereNotNull('prize_number')
            ->whereNotNull('prize_type')
            ->whereNotNull('assigned')
            ->get();

        return view('admin.live_prizes.index', compact('livePrizes'));
    }
}
