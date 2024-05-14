<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prize;
use App\Models\PrizeUser;
use App\Models\Vouchers;
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

        $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {

          $cookie = Cookie::queue(Cookie::forget('pointtype'));
        }

        return view('unlucky');
    }

    public function saved(Request $request)
    {
         $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {

           $cookie = Cookie::queue(Cookie::forget('pointtype'));

        }
        return view('unlucky');
    }

    public function goal(Request $request)
    {
        /* $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {
            $cookie = cookie()->forget($cookieName);
        }*/
        $userID = '';
        $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {
            $pointTypeData = $request->cookie('pointtype');
            $pointTypeData = json_decode($pointTypeData,true);
            $userId = (isset($pointTypeData['user_id']) &&  $pointTypeData['user_id'] !="") ? $pointTypeData['user_id'] : '';
        }   
        $PrizeCount = Prize::count();
        $PrizeCount = $PrizeCount + 20 ;
        // Generate a random number
        $randomNumber = mt_rand(1, $PrizeCount);
        $randomNumber = 209;
        if($userId !="") {
            $user = User::findOrFail($userId);
        }
      
        // print_r($randomNumber);
        if( (isset($user->prize_id) || isset($user->voucher_id)) && ($user->prize_id !="" || $user->voucher_id !="" ) ){

            $prize = Prize::where('id', $user->prize_id)
                ->first();

            if (isset($prize->prize_type) && $prize->prize_type === 'tshirt') {
                return view('tshirt');
            } elseif (isset($prize->prize_type) &&  $prize->prize_type === 'scarf') {
                return view('scarf');
            } elseif (isset($prize->prize_type) &&  $prize->prize_type === 'ticket') {
                return view('ticket');
            } else {
                return view('voucher');
            }
        } else {
            // Query the database to find a prize with the exact generated number
            /*$prize = Prize::where('prize_number', $randomNumber)
                ->whereNull('assigned')
                ->first();*/
            $prize = Prize::select('*', DB::raw('ABS(prize_number) AS absolute_prize_number'))
                ->whereBetween('prize_number', [$randomNumber - 10, $randomNumber])
                ->where(function($query) {
                    $query->where('assigned', '!=', 'true')
                          ->orWhereNull('assigned');
                })
                ->orderBy('prize_number', 'desc')
                ->first();
            if ($prize) {
              
                // Assign the nearest unassigned prize to the user
                $user = User::findOrFail($userId);
                $user->prize_id = $prize->id;
                $user->save();
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
                ->whereBetween('prize_number', [$randomNumber - 10, $randomNumber])
                    ->orderBy(DB::raw('ABS(prize_number - ' . $randomNumber . ')'))
                    ->first();
                $nearestPrize = Prize::whereBetween('prize_number', [$randomNumber, $randomNumber + 10])
                ->where(function($query) {
                   $query->where('assigned', '!=', 'true')
                         ->orWhereNull('assigned');
                })
                ->orderBy('prize_number', 'asc')
                ->first();
                
                if ($nearestPrize) {
                    $user = User::findOrFail($userId);
                    // Assign the nearest unassigned prize to the user
                    $user->prize_id = $nearestPrize->id;
                    $user->save();
                    // print_r("near");
                    // print_r($nearestPrize);
                    // Mark the prize as assigned
                    $nearestPrize->assigned = true;
                    $nearestPrize->assigned = $nearestPrize->assigned ? 'true' : 'false'; // Convert boolean to string
                    $nearestPrize->save();
                     // dd($nearestPrize);

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
                    $voucher = new Vouchers();
                    $voucher->prize_type = 'vouchers';
                    $voucher->user_id = $user->id;
                    $voucher->prize_number = $randomNumber;
                    $voucher->assigned = 'true'; // Convert boolean to string
                    $voucher->confirmed = 'true'; // Convert boolean to string
                    $voucher->save();
                    $user->voucher_id = $voucher->id;
                    $user->voucher_id = $voucher->id;
                    $user->save();
                    $PrizeUser = new PrizeUser();
                    $PrizeUser->voucher_id = $voucher->id;
                    $PrizeUser->prize_type = 'vouchers';
                    $PrizeUser->user_id = $user->id;
                    $PrizeUser->save(); 
                    return view('voucher');
                }
            }
        }
    }


    public function scarfForm()
    {
        return view('scarfForm');
    }

    public function AddDetailData(Request $request)
    {   

       
        $email = '';
        $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {

            $pointTypeData = $request->cookie('pointtype');

            $pointTypeData = json_decode($pointTypeData,true);
            $userId = (isset($pointTypeData['user_id']) &&  $pointTypeData['user_id'] !="") ? $pointTypeData['user_id'] : '';
            
            if($userId !="") {

                $user = User::findOrFail($userId);
                $email = $user->email; 
                $prize_id  = $user->prize_id;
                $Prize = Prize::findOrFail($prize_id);
                $prizeType = $Prize->prize_type;

            }

            return view('ticketForm',compact('email','prizeType'));
        }   else {
             return redirect()->route('home'); 
        }
      
    }

    public function close()
    {

        return view('gameclose');
    }

     public function voucher()
    {
        Cookie::queue(Cookie::forget('pointtype'));
        return view('thanks-voucher');
    }

    public function uploadProof(Request $request) {
       if ($request->hasFile('proof_img')) {
            $image = $request->file('proof_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('../assets/uploads/userproof'), $imageName);
            return response()->json(['success' => 'Image uploaded successfully.', 'image' => $imageName]);
        }
        return response()->json(['error' => 'No image found.']);
        
    }
    public function addDetail(Request $request) {
        $params = $request->all();
        $cookieName = 'pointtype';
        if ($request->hasCookie($cookieName)) {
            
            $pointTypeData = $request->cookie('pointtype');

            $pointTypeData = json_decode($pointTypeData,true);
            $userId = (isset($pointTypeData['user_id']) &&  $pointTypeData['user_id'] !="") ? $pointTypeData['user_id'] : '';
            
            if($userId !="") {
                $user = User::findOrFail($userId);
                $prize_id  = $user->prize_id;
                $user->address =  $params['address_line1'].' '.$params['address_line2'].' '.$params['town'].' '.$params['city'].' '.$params['postcode'];
                $user->photos =  $params['image_name'];
                // $user->user_proof = $params['image_name'];
                if(isset($params['size']) && $params['size'] !="" ) {
                    $user->tshirt_size =  $params['size'];
                }
                $user->save();
                $Prize = Prize::findOrFail($prize_id);
                $prizeType = $Prize->prize_type;
                $Prize->confirmed = 'true';
                $Prize->save();
              
                $PrizeUser = new PrizeUser();
                $PrizeUser->prize_id = $prize_id;
                $PrizeUser->prize_type = $prizeType;
                $PrizeUser->user_id = $userId;
                $PrizeUser->user_proof = $params['image_name'];
                $PrizeUser->save();
            }
        } else {
           return redirect()->route('home'); 
        }
        Cookie::queue(Cookie::forget('pointtype'));
        return redirect()->route('thankyou');
    }

    public function ThankYou() {
        return view('thanku');
    }
}
