<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Auth;

class CardDisplayController extends Controller
{
    public function cardDisplay()
    {
        // Setting variables for card search

        $baseUrl = 'https://api.scryfall.com/cards/search?q=';
        $searchRed = '';
        $searchGreen = '';
        $searchWhite = '';
        $searchBlack = '';
        $searchBlue = '';
        $searchColorless = '';
        $searchName = '';
        $searchSet = '';
        $searchRarity = '';
        $searchFormat = '';
        $searchCreatureType = '';
        $searchPlaneswalkerType = '';
        $searchLandType = '';
        $searchArtifactType = '';
        $searchEnchantmentType = '';
        $searchSpellType = '';



        // Set the options to retrieve all the asked cards
        // Get the input from the form to know what to search for:

        if (isset($_GET['search'])) {
            // Basic card searches
            // Adding the search parameter to the api call
            if (isset($_GET['green'])) {
                $searchGreen = 'c=g';
            } elseif (isset($_GET['red'])) {
                $searchRed = 'c=r';
            } elseif (isset($_GET['blue'])) {
                $searchBlue = 'c=u';
            } elseif (isset($_GET['black'])) {
                $searchBlack = 'c=b';
            } elseif (isset($_GET['white'])) {
                $searchWhite = 'c=w';
            } elseif (isset($_GET['colorless'])) {
                $searchColorless = 'c=c';
            } elseif (isset($_GET['rarity'])) {
                $searchRarity = 'r:' . $_GET['rarity'];
            } elseif (isset($_GET['format'])) {
                $searchFormat = 'f:' . $_GET['format'];
            } elseif (isset($_GET['set'])) {
                $searchFormat = 's:' . $_GET['set'];
            } elseif (isset($_GET['creatureType'])) {
                $chosenType = strtolower($_GET['creatureType']);
                $searchCreatureType = 't:' . $chosenType;
            } elseif (isset($_GET['planeswalkerType'])) {
                $chosenType = strtolower($_GET['planeswalkerType']);
                $searchPlaneswalkerType = 't:' . $chosenType;
            } elseif (isset($_GET['landType'])) {
                $chosenType = strtolower($_GET['landType']);
                $searchLandType = 't:' . $chosenType;
            } elseif (isset($_GET['artifactType'])) {
                $chosenType = strtolower($_GET['artifactType']);
                $searchArtifactType = 't:' . $chosenType;
            } elseif (isset($_GET['enchantmentType'])) {
                $chosenType = strtolower($_GET['enchantmentType']);
                $searchEnchantmentType = 't:' . $chosenType;
            } elseif (isset($_GET['spellType'])) {
                $chosenType = $_GET['spellType'];
                $searchSpellType = 't:' . $chosenType;
            }
            // Initialize the call to the Api
            $curl = curl_init();
            // Set the options to retrieve all the asked cards
            $opts = [
                CURLOPT_URL => $baseUrl
                    . $searchGreen
                    . $searchBlack
                    . $searchBlue
                    . $searchColorless
                    . $searchRed
                    . $searchWhite
                    . $searchName
                    . $searchSet
                    . $searchRarity
                    . $searchFormat
                    . $searchCreatureType
                    . $searchPlaneswalkerType
                    . $searchLandType
                    . $searchArtifactType
                    . $searchEnchantmentType
                    . $searchSpellType,
                CURLOPT_RETURNTRANSFER => true,
                // only needed for the first call inside the cardDisplay function
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ];
            // Run the call to the Api
            curl_setopt_array($curl, $opts);

            // Decode the received json to use the data
            $cards = json_decode(curl_exec($curl));

            curl_close($curl);

            return view('cardDisplay', [
                'cards' => $cards
            ]);
        }
        // Prepare the next result page:
        elseif (isset($_GET['nextPage'])) {


            $curl = curl_init();
            // Set the options to retrieve random cards
            $opts = [
                CURLOPT_URL => 'api.scryfall.com/cards/search?',
                CURLOPT_RETURNTRANSFER => true,
                // only needed for the first call inside the cardDisplay function
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ];
            // Run the call to the Api
            curl_setopt_array($curl, $opts);

            // Decode the received json to use the data
            $cards = json_decode(curl_exec($curl));

            curl_close($curl);
            return view('cardDisplay', [
                'cards' => $cards,
            ]);
        } else {
            $curl = curl_init();
            // Set the options to retrieve random cards
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
            $cards = json_decode(curl_exec($curl));

            curl_close($curl);

            return view('cardDisplay', [
                'cards' => $cards,
            ]);
        }
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

        $user = Auth::user();
        //$cards = Card::where("user_id", "=", $user->id)->get();

        $cards = new Card();
        // Input::get('id', 'NA');
        $cards->name = $request->id;
        //$card->cost = $request->cost;
        $cards->user_id = Auth::user()->id;
        $cards > save();
        // return redirect('cardDisplay');
        var_dump($cards);

        return view('cardDisplay', compact('user', $user))->with('card', $cards);
    }
}
