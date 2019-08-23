<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postsN = Post::orderBy('id','desc')->limit(3)->get();

        return view('home', ['postsN' => $postsN]);
      
    }

    public function admin(Request $req)
    {
        if (Auth::user()->type = 'admin')
            return view('admin');
        else
            return view('middleware')->withMessage("Admin");
    }
    public function super_admin(Request $req)
    {
        return view('middleware')->withMessage("Super Admin");
    }
    public function member(Request $req)
    {
        return view('middleware')->withMessage("Member");
    }
}
