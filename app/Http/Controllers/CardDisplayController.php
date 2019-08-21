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
            $searchCardName = '';
            $searchSet = '';
            $searchRarity = '';
            $searchFormat = '';
            $searchCreatureType = '';
            $searchPlaneswalkerType = '';
            $searchLandType = '';
            $searchArtifactType = '';
            $searchEnchantmentType = '';
            $searchSpellType = '';
            $searchMultiColor = '';
            $searchCMC = '';
            $searchFoil = '';
            $addBlack = '';
            $addBlue = '';
            $addGreen = '';
            $addRed = '';
            $addWhite = '';
            

            // Set the options to retrieve all the asked cards
            // Get the input from the form to know what to search for:
            
            if(isset($_GET['search'])){ 
                // Basic card searches
                // Adding the search parameter to the api call
                if(isset($_GET['multicolor'])){
                    if(isset($_GET['green'])){
                        $addGreen = 'g';
                    }
                    if(isset($_GET['blue'])){
                        $addBlue = 'u';
                    }
                    if(isset($_GET['black'])){
                        $addBlack = 'b';
                    }
                    if(isset($_GET['red'])){
                        $addRed = 'r';
                    }
                    if(isset($_GET['white'])){
                        $addWhite = 'w';
                    }
                    $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' '; 
                }
                if(isset($_GET['green'])){
                    if(isset($_GET['multicolor'])){
                        $searchGreen = '';
                    }elseif(!isset($_GET['multicolor'])){
                        if(isset($_GET['green'])){
                            $addGreen = 'g';
                        }
                        if(isset($_GET['blue'])){
                            $addBlue = 'u';
                        }
                        if(isset($_GET['black'])){
                            $addBlack = 'b';
                        }
                        if(isset($_GET['red'])){
                            $addRed = 'r';
                        }
                        if(isset($_GET['white'])){
                            $addWhite = 'w';
                        }
                        $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' ';
                    }else{
                        $searchGreen = 'c=g ';
                    }
                }
                if(isset($_GET['red'])){
                    if(isset($_GET['multicolor'])){
                        $searchRed = '';
                    }elseif(!isset($_GET['multicolor'])){
                        if(isset($_GET['green'])){
                            $addGreen = 'g';
                        }
                        if(isset($_GET['blue'])){
                            $addBlue = 'u';
                        }
                        if(isset($_GET['black'])){
                            $addBlack = 'b';
                        }
                        if(isset($_GET['red'])){
                            $addRed = 'r';
                        }
                        if(isset($_GET['white'])){
                            $addWhite = 'w';
                        }
                        $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' ';
                    }else{
                        $searchRed = 'c=g ';
                    }
                }
                if(isset($_GET['blue'])){
                    if(isset($_GET['multicolor'])){
                        $searchBlue = '';
                    }elseif(!isset($_GET['multicolor'])){
                        if(isset($_GET['green'])){
                            $addGreen = 'g';
                        }
                        if(isset($_GET['blue'])){
                            $addBlue = 'u';
                        }
                        if(isset($_GET['black'])){
                            $addBlack = 'b';
                        }
                        if(isset($_GET['red'])){
                            $addRed = 'r';
                        }
                        if(isset($_GET['white'])){
                            $addWhite = 'w';
                        }
                        $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' ';
                    }else{
                        $searchBlue = 'c=g ';
                    }
                }
                if(isset($_GET['black'])){
                    if(isset($_GET['multicolor'])){
                        $searchBlack = '';
                    }elseif(!isset($_GET['multicolor'])){
                        if(isset($_GET['green'])){
                            $addGreen = 'g';
                        }
                        if(isset($_GET['blue'])){
                            $addBlue = 'u';
                        }
                        if(isset($_GET['black'])){
                            $addBlack = 'b';
                        }
                        if(isset($_GET['red'])){
                            $addRed = 'r';
                        }
                        if(isset($_GET['white'])){
                            $addWhite = 'w';
                        }
                        $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' ';
                    }else{
                        $searchBlack = 'c=g ';
                    }
                }
                if(isset($_GET['white'])){
                    if(isset($_GET['multicolor'])){
                        $searchWhite = '';
                    }elseif(!isset($_GET['multicolor'])){
                        if(isset($_GET['green'])){
                            $addGreen = 'g';
                        }
                        if(isset($_GET['blue'])){
                            $addBlue = 'u';
                        }
                        if(isset($_GET['black'])){
                            $addBlack = 'b';
                        }
                        if(isset($_GET['red'])){
                            $addRed = 'r';
                        }
                        if(isset($_GET['white'])){
                            $addWhite = 'w';
                        }
                        $searchMultiColor = 'c:' . $addBlack . $addBlue . $addGreen . $addRed . $addWhite . ' ';
                    }else{
                        $searchWhite = 'c=g ';
                    }
                }
                if(isset($_GET['colorless'])){
                    $searchColorless = 'c=c ';
                }
                if(isset($_GET['rarity'])){
                    $searchRarity = 'r:' . $_GET['rarity'] . ' ';
                }
                if(isset($_GET['format'])&&($_GET['format'] !== '')){
                    $searchFormat = 'f:' . $_GET['format'] . ' ';
                } else {
                    $searchFormat = '';
                }
                if(isset($_GET['set'])){
                    $searchFormat = 's:' . $_GET['set'] . ' ';
                }
                if(isset($_GET['creatureType'])){
                    $chosenType = strtolower($_GET['creatureType']);
                    $searchCreatureType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['planeswalkerType'])){
                    $chosenType = strtolower($_GET['planeswalkerType']);
                    $searchPlaneswalkerType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['landType'])){
                    $chosenType = strtolower($_GET['landType']);
                    $searchLandType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['artifactType'])){
                    $chosenType = strtolower($_GET['artifactType']);
                    $searchArtifactType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['enchantmentType'])){
                    $chosenType = strtolower($_GET['enchantmentType']);
                    $searchEnchantmentType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['spellType'])){
                    $chosenType = $_GET['spellType'];
                    $searchSpellType = 't:' . $chosenType . ' ';
                }
                if(isset($_GET['cardName'])&&($_GET['cardName'] !== '')){
                    $searchCardName = "!'" . $_GET['cardName'] . "'";
                }else{
                    $searchCardName = '';
                }
                if(isset($_GET['cmc'])&&($_GET['cmc'] !== '')){
                    $searchCMC = 'cmc=' . $_GET['cmc'] . ' ';
                }else{
                    $searchCMC = '';
                }
                if(isset($_GET['foil'])){
                    $searchFoil = 'is:foil' . ' ';
                }
                // Encoding the final URL to make the API call
                $finalQuery = str_replace(' ', '%20', $baseUrl 
                    . $searchGreen
                    . $searchBlack 
                    . $searchBlue
                    . $searchColorless 
                    . $searchRed
                    . $searchWhite
                    . $searchSet
                    . $searchRarity
                    . $searchFormat
                    . $searchCreatureType 
                    . $searchPlaneswalkerType
                    . $searchLandType
                    . $searchArtifactType
                    . $searchEnchantmentType
                    . $searchSpellType
                    . $searchMultiColor
                    . $searchCardName
                    . $searchCMC
                    . $searchFoil);
                // Initialize the call to the Api
                $curl = curl_init();
                // Set the options to retrieve all the asked cards
                $opts = [
                     CURLOPT_URL => $finalQuery,
                    CURLOPT_RETURNTRANSFER => true,
                    // only needed for the first call inside the cardDisplay function
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ];
                // Run the call to the Api
                curl_setopt_array($curl, $opts);
                //var_dump( $opts[CURLOPT_URL]);

                // Decode the received json to use the data
                $cards = json_decode(curl_exec($curl));

                curl_close($curl);
                      
                return view('search_page', [
                    'cards' => $cards
                    ]);

            } 
            // Prepare the next result page:
            elseif(isset($_GET['nextPage'])) {

               
                $curl = curl_init();
                $opts = [
                    CURLOPT_URL => 'https://api.scryfall.com/cards/search?format=json&include_extras=false&include_multilingual=false&order=name&page=2&q=color%3Ab+-c%3Arguw&unique=cards',
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
                 return view('search_page', [
                     'cards' => $cards,
                     ]);

            }
            else {
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

                return view('search_page', [
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