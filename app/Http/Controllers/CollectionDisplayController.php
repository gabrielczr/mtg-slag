<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionDisplayController extends Controller
{
    public function collectionDisplay() 
    {
        $cardIDs = array('18c0b3b3-bb62-42c5-9869-386af0540a9b',
                        'cb7a2770-9a20-4f52-aac4-24502f50e374',
                        '85e71828-095b-4729-ab11-c6c39ba29aab',
                        '84319dfb-eaf7-4b98-8c4f-30f5e779591b');

        foreach ($cardIDs as $cardID) {
            $baseURL = 'https://api.scryfall.com/cards/'; 
                
                    $curl = curl_init();
                    // Set the options to retrieve all the asked cards and passing the final search url
                    $opts = [
                        CURLOPT_URL => $baseURL . $cardID,
                        CURLOPT_RETURNTRANSFER => true,
                        // only needed for the first call inside the cardDisplay function
                        CURLOPT_SSL_VERIFYHOST => false,
                        CURLOPT_SSL_VERIFYPEER => false
                    ];
                    // Run the call to the Api
                    curl_setopt_array($curl, $opts);
                    //var_dump($opts[CURLOPT_URL]);
                
                    // Decode the received json to use the data
                    $cardID = json_decode(curl_exec($curl));
                
                    curl_close($curl);
                    //var_dump($cardID);
                    
                    echo '<div>
                    <p>' . $cardID->name . '</p>';
                    if ($cardID->layout == 'transform') 
                    {
                     $cardImages = $cardID->card_faces;
                     foreach ($cardImages as $cardImage) {
                         // images are set to small for development
                         // Change it in the final display, options are small, normal, large and png
                         // png would possibly be the best choice since it gets rid off the corners!
                         // delete this comments after you are done!!!!
                         echo '<img src="' . $cardImage->image_uris->small . '" alt="' . $card->name . '">';
                        }
                        
                    } elseif ($cardID->layout !== 'transform'){
                        $cardImages = $cardID->image_uris;
                        // images are set to small for development
                        // Change it in the final display, options are small, normal, large and png
                        // png would possibly be the best choice since it gets rid off the corners!
                        // delete this comments after you are done!!!!
                        echo '<img src="' . $cardImages->small . '" alt="' . $cardID->name . '">';
                    } else {
                        $cardImages = 'No Image for this card provided';
                        echo $cardImages;
                    }
                    echo '</div>';
                    echo '<hr>';
                // return view('collectionDisplay', [
                //     'cardID' => $cardID
                //     ]);
                    }
        
    }    
    
    
}


