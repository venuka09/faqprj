<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Profile;
use App\User;

class AllprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user() && Auth::user()->type == 'admin'){
        $user = Auth::user();
        $profiles = $user->profile()->paginate(10);
        $query = DB::table('profiles')->select('*');
        $profiles = $query->get();
        //dd($profiles);
        return view('allprofile')->with('profiles', $profiles);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showq($id)
    {
        $query = DB::table('questions')->select('*')->where('user_id', '=', $id );
        $questions = $query->get();
        //dd(count($questions));
        return view('home')->with('questions', $questions);
    }
    public function destroy($id)
    {
        $profile = Profile::find($profile);
        $profile->delete();
        return redirect()->route('home')->with('message', 'Profile Deleted');
    }
}
