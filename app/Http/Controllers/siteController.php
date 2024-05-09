<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Prize;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Cookie;

class siteController extends Controller
{
    public function initial()
    {
        return view('initial-detail');
    }

    public function missed(Request $request)
    {
       
        /*$cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {

          $cookie = Cookie::queue(Cookie::forget('pointtype'));
        }
*/
        return view('unlucky');
    }

    public function saved(Request $request)
    {
       /* $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {

           $cookie = Cookie::queue(Cookie::forget('pointtype'));

        }*/
        return view('unlucky');
    }

    public function goal(Request $request)
    {
       /* $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {
            $cookie = cookie()->forget($cookieName);
        }*/
        // Generate a random number
        $randomNumber = mt_rand(1, 900);
        print_r($randomNumber);

        // Query the database to find a prize with the exact generated number
        $prize = Prize::where('prize_number', $randomNumber)
            ->whereNull('assigned')
            ->first();

        if ($prize) {
            // If a prize with the exact generated number is found
            
              // Assign the nearest unassigned prize to the user
                // $user->prize_id = $prize->id;
                // $user->save();

            print_r("prize");
            $prize->assigned = true;
            $prize->assigned = $prize->assigned ? 'true' : 'false'; // Convert boolean to string
            $prize->save();

            if ($prize->prize_type === 'tshirt') {
                return view('tshirt');
            } elseif ($prize->prize_type === 'scarf') {
                return view('scarf');
            } elseif ($prize->prize_type === 'ticket') {
                return view('ticket');
            }
        } else {
            // If a prize with the exact generated number is not found, find the nearest unassigned prize number
            $nearestPrize = Prize::whereNull('assigned')
                ->orderBy(DB::raw('ABS(`prize_number` - ' . $randomNumber . ')'))
                ->first();

            if ($nearestPrize) {

                // Assign the nearest unassigned prize to the user
                // $user->prize_id = $nearestPrize->id;
                // $user->save();

                // Mark the prize as assigned
                $nearestPrize->assigned = true;
                $nearestPrize->assigned = $nearestPrize->assigned ? 'true' : 'false'; // Convert boolean to string
                $nearestPrize->save();

                // Do something with the allocated prize, such as displaying it
                if ($nearestPrize->prize_type === 'tshirt') {
                    return view('tshirt');
                } elseif ($nearestPrize->prize_type === 'scarf') {
                    return view('scarf');
                } elseif ($nearestPrize->prize_type === 'ticket') {
                    return view('ticket');
                }
            } else {
                // No unassigned prize found with the generated number or nearby
                return view('voucher');
            }
        }
    }
}
