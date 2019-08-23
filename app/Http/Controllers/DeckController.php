<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;
use App\Deck;

class DeckController extends Controller
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
        $cardIDs = Deck::all();
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
            $cardss[] = json_decode(curl_exec($curl));
            curl_close($curl);
            // echo '<div> <p>' . $cardID->name . '</p>';
            if ($cardID->layout == 'transform') {
                $cardImages = $cardID->card_faces;
                foreach ($cardImages as $cardImage) {
                    //  echo '<img src="' . $cardImage->image_uris->small . '" alt="' . $card->name . '">';
                }
            } elseif ($cardID->layout !== 'transform') {
                $cardImages = $cardID->image_uris;
                // echo '<img src="' . $cardImages->small . '" alt="' . $cardID->name . '">';
            } else {
                $cardImages = 'No Image for this card provided';
                //   echo $cardImages;
            }
            //echo '</div>';
            //var_dump($cardss);
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
        return view('deck.create');
    }

    public function store(Request $request)
    {

        // $user = Auth::user();
        //$cards = Card::where("user_id", "=", $user->id)->get();

        $decks = new Deck();
        // Input::get('id', 'NA');
        $decks->name = $request->id;
        $decks->card_id = Card::$id;
        $decks->user_id = Auth::user()->id;
        // $cards > save();
        $decks->touch();
        return redirect('deck');


        //return view('cardDisplay', compact('user', $user))->with('card', $card);
    }

    public function destroy($id)
    {
        $card = Deck::find($id);
        $card->delete();
        // OR
        // Card::destroy($id);
        return redirect('deck');
    }
}
