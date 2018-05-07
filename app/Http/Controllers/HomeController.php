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
            $user = Auth::user();
            $questions = $user->questions()->paginate(6);
            return view('home')->with('questions', $questions);
    }


    public function show($id)
    {
        $query = DB::table('questions')->select('*')->where('user_id', '=', $id );
        $questions = $query->get();
        //dd(count($questions));
        return view('profilequestion')->with('questions', $questions);
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
