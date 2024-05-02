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
        LivePrize::truncate();

        $prizes = Prize::whereNotNull('id')
            ->whereNotNull('prize_number')
            ->whereNotNull('prize_type')
            ->get();

        // dd($prizes);

        // Insert fetched entries into live_prizes table
        foreach ($prizes as $prize) {
            // Create live prize only if all fields are present
            LivePrize::updateOrCreate(
                ['prize_id' => $prize->id], // Here 'prize_id' is the column name in the 'LivePrize' table
                [
                    'prize_number' => $prize->prize_number,
                    'prize_type' => $prize->prize_type,
                ]
            );
        }

        // Fetch synchronized prizes
        $livePrizes = LivePrize::all();

        // dd($livePrizes);

        return view('admin.live_prizes.index', compact('livePrizes'));
    }
}
