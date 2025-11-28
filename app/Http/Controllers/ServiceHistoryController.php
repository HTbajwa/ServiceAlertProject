<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    //
    public function UserHistory(User $user)
    {
        $UserHistor=$user->ServiceItems()->with("dailyUsages")->get();
        return response()->json([
            "message"=>"fetched Successfully",
            "history"=>$UserHistor
        ]);
    }
       public function AllUserHistory()
    {
        $UserHistor=User::with("ServiceItems.dailyUsages")->get();
        return response()->json([
            "message"=>"All users history fetched Successfully",
            "history"=>$UserHistor
        ]);
    }
}
