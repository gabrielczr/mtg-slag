<?php

namespace App\Http\Controllers;

use Auth;
use App\Card;
use App\User;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function getAuthUser()
    {
        return Auth::user();
    }
    public function user()
    {

        return $this->hasMany(User::class);
    }
    public function index()
    {
        $cards = Card::all();
        //$id = Card::find($name);
        //$name = \App\Card::find(1);
        //echo $name . 'this';
        foreach ($cards as $card) {

            $id = $card->name;
            $baseUrl = 'https://api.scryfall.com/cards/' . $id;
            $curl = curl_init();
            $opts = [
                CURLOPT_URL => $baseUrl,
                CURLOPT_RETURNTRANSFER => true,
                // only needed for the first call inside the cardDisplay function
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ];
            curl_setopt_array($curl, $opts);
            $data = json_decode(curl_exec($curl));
            curl_close($curl);
            //echo Card::where('name', "=", $data->id)->get();

            $results = Card::where("name", "=", $data->id)->get();
        }
        // return view('card', ['cards' => $cards])->withData($data);
        return view('card', ['cards' => $cards])->withData($data);
    }

    public function create()
    {
        /*
        if (user()->type != 'admin') {
            return new Response(view('unauthorized')->with('role', 'ADMIN'));
        }*/
        return view('card.create');
    }

    public function store(Request $request)
    {

        // $user = Auth::user();
        //$cards = Card::where("user_id", "=", $user->id)->get();

        $cards = new Card();
        // Input::get('id', 'NA');
        $cards->name = $request->id;

        $cards->user_id = Auth::user()->id;
        // $cards > save();
        $cards->touch();
        return redirect('card');


        //return view('cardDisplay', compact('user', $user))->with('card', $card);
    }
}
