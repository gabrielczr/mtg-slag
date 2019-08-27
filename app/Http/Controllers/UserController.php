<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use App\Card;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function news()
    {

        return $this->hasMany(Post::class);
    }

    public function cards()
    {

        return $this->hasMany(Card::class);
    }



    /*
    public function view_post($id)
    {
        $user = User::find($id);
        $posts   = Post::all();

        //return View::make('/profile.show', compact('posts'));
        return view('profile.shows')->with('posts', $posts);
    }*/

    public function profile()
    {
        $user = Auth::user();
        $posts = Post::where("user_id", "=", $user->id)->get();
        $cards = Card::where("user_id", "=", $user->id)->get();
        $decks = Deck::where("user_id", "=", $user->id)->get();
        //return view('profile', compact('user', $user));
        return view('profile', compact('user', $user))->with('posts', $posts);
    }

    public function update_avatar(Request $request)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success', 'You have successfully upload image.');
    }
}
