<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index()
    {


        $posts = Post::all();

        return view('news', ['posts' => $posts]);
    }

    public function __construct()
    {
        return $this->middleware('auth');
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
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->summary = $request->summary;
        $post->content = $request->content;
        //$post->active = 0; this is only for the editor/contributor
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
