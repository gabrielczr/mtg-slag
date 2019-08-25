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
        $cardIDs = Card::all();
        $cardss = [];
        foreach ($cardIDs as $cardID) {

            $id = $cardID->name;
            $baseUrl = 'https://api.scryfall.com/cards/' . $id;
            //var_dump($baseUrl);
            //echo $baseUrl;
            $curl = curl_init();
            // Set the options to retrieve all the asked cards and passing the final search url
            $opts = [
                CURLOPT_URL => $baseUrl,
                CURLOPT_RETURNTRANSFER => true,
                // only needed for the first call inside the cardDisplay function
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ];
            // Run the call to the Api
            curl_setopt_array($curl, $opts);
            // Decode the received json to use the data
            $cardss[] = [$cardID->id, json_decode(curl_exec($curl))];
            curl_close($curl);
        }
        return view('card', ['cardss' => $cardss]);
        //return view('card')->with('cardss', json_decode($cardss, true));
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

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();
        // OR
        // Card::destroy($id);
        return redirect('card');
    }
}
