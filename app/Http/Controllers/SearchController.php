<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index()
    {
        // Initialize the call to the Api
        $curl = curl_init();
        // Set the options to retrieve all the sets/editions
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/sets',
            CURLOPT_RETURNTRANSFER => true,
            // only needed for the first call inside the index function
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        ];
        // Run the call to the Api
        curl_setopt_array($curl, $opts);

        // decode the received json to use the data
        $sets = json_decode(curl_exec($curl));

        // Prepare the call for creature types and run it
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/catalog/creature-types',

        ];

        curl_setopt_array($curl, $opts);

        $creatureTypes = json_decode(curl_exec($curl));

        // Prepare the call for planeswalker types and run it
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/catalog/planeswalker-types',
        ];

        curl_setopt_array($curl, $opts);

        $planeswalkerTypes = json_decode(curl_exec($curl));

        // Prepare the call for land types and run it
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/catalog/land-types',
        ];

        curl_setopt_array($curl, $opts);

        $landTypes = json_decode(curl_exec($curl));

        // Prepare the call for artifact types and run it
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/catalog/artifact-types',

        ];

        curl_setopt_array($curl, $opts);

        $artifactTypes = json_decode(curl_exec($curl));

        // Prepare the call for enchantment types and run it
        $opts = [
            CURLOPT_URL => 'https://api.scryfall.com/catalog/enchantment-types',
        ];

        curl_setopt_array($curl, $opts);

        $enchantmentTypes = json_decode(curl_exec($curl));

        curl_close($curl);

        return view('search_page', [
            'sets' => $sets,
            'creatureTypes' => $creatureTypes,
            'planeswalkerTypes' => $planeswalkerTypes,
            'landTypes' => $landTypes,
            'artifactTypes' => $artifactTypes,
            'enchantmentTypes' => $enchantmentTypes,
        ]);
    }
}
