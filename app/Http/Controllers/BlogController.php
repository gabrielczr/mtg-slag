<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {


        $posts = Post::all();

        return view('news', ['posts' => $posts]);
    }

    public function __construct()
    {
       // return $this->middleware('auth');
    }

    public function create()
    {
        /*
        if (user()->type != 'admin') {
            return new Response(view('unauthorized')->with('role', 'ADMIN'));
        }*/
        return view('news.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->content;
        $post->slug = $request->slug;
        
        $imageName = request()->image->getClientOriginalName();

        $request->image->storeAs('images', $imageName);

        $post->image = $imageName;


        $post->image = $imageName;
       
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('news');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view(
            'show',
            ['post' => $post]
        );
    }

    public function user()
    {

        return $this->hasMany(User::class);
    }

    public function view_post()
    {
        //$user = User::find('id');
        $user = Auth::user();
        $posts = Post::where("user_id", "=", $user->id)->get();
        //$posts = $user->posts()->get();

        //return  view("profile", ["user" => $user, "posts" => $posts]);
        return view('profile.shows')->with('posts', $posts);
    }
}
