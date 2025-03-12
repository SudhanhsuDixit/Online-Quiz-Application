<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    
    public function ShowResult()
    {
        $id = Auth::user()->id;
        $resultData = Result::where('user_id', $id)->get();
        return view('frontend.profile.result_profile_view',compact('resultData'));
    }

    public function DeleteResult($id)
    {
       
        Result::destroy($id);
        return back()->withSuccess('Result deleted Successfull!!!');
    }
}
