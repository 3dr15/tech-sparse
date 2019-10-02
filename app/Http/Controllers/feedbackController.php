<?php

namespace App\Http\Controllers;

use App\RatingNFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class feedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('sendFeedback');
    }

    public function postFeedback(Request $request){
        $this->validate($request,[
            'email'=>'string|email|max:255',
            'rate'=>'string|required',
            'feedback'=>'string',
        ]);
        $feedback=new RatingNFeedback();
        $feedback->user_id=Auth::user()->id;
        $feedback->rating=$request->rate;
        $feedback->feedback=$request->feedback;
        $feedback->save();
        return redirect()->back()->with('success','Feedback Sent');
    }
}
