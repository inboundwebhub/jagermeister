<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Models\Vouchers;
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
            ->get();
        $vouchers = Vouchers::whereNotNull('prize_number')
            ->whereNotNull('prize_type')
            ->get();
        // $combinedData = $livePrizes->merge($vouchers);
        $combinedData = $livePrizes->concat($vouchers);

        return view('admin.live_prizes.index', compact('combinedData'));
    }
}
