<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        if (Auth::user() && Auth::user()->type == 'admin'){
            $user = Auth::user();
            $profiles = $user->profile()->paginate(10);
            $query = DB::table('profiles')->select('*');
            $profiles = $query->get();
            //dd($profiles);
            return view('allprofile')->with('profiles', $profiles);
        }
        else {*/
            $user = Auth::user();
            $questions = $user->questions()->paginate(6);
            return view('home')->with('questions', $questions);
        //}
    }
    public function admin(Request $req)
    {
        return view('middleware')->with('message','Admin');
    }
    public function member(Request $req)
    {
        return view('middleware')->with('message','Member');
    }
}
