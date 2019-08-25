<?php

namespace App\Http\Controllers;
use App\Card;
use Illuminate\Http\Request;

class CollectionDisplayController extends Controller
{
    public function collectionDisplay()
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
        return view('collectionDisplay', ['cardss' => $cardss]);
        //return view('card')->with('cardss', json_decode($cardss, true));
    }
}
