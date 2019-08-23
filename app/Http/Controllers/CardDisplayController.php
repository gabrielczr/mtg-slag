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
            
            $baseUrl = 'https://api.scryfall.com/cards/search?';
            $searchOrder = '';
            $searchCardName = '';
            $searchRed = '';
            $searchGreen = '';
            $searchWhite = '';
            $searchBlack = '';
            $searchBlue = '';
            $searchColorless = '';
            $addBlack = '';
            $addBlue = '';
            $addGreen = '';
            $addRed = '';
            $addWhite = '';
            $searchCMC = '';
            $searchFoil = '';
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
            
            

            // Set the options to retrieve all the asked cards
            // Get the input from the form to know what to search for:
            
            if(isset($_GET['search'])){ 

                // Basic card searches

                // Building the appendixes for the base URL according to the needed queries
                
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
                    $searchMultiColor = 'c=' 
                                        . $addBlack 
                                        . $addBlue 
                                        . $addGreen 
                                        . $addRed 
                                        . $addWhite 
                                        . ' '; 
                }
                
                // To prevent an error, when selecting multiple colors, whitout selecting the multicolor checkbox
                
                // Search for green cards
                if(isset($_GET['green'])){
                    if(isset($_GET['multicolor'])){
                        $searchGreen = '';
                    }elseif(
                        !isset($_GET['multicolor'])&&
                        (isset($_GET['blue']))||
                        (isset($_GET['black']))||
                        (isset($_GET['red']))||
                        (isset($_GET['green']))
                    ){
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
                        $searchMultiColor = 'c=' 
                                            . $addBlack 
                                            . $addBlue 
                                            . $addGreen 
                                            . $addRed 
                                            . $addWhite
                                            . ' ';
                    }else{
                        $searchGreen = 'c=g ';
                    }
                }

                // Search for red cards
                if(isset($_GET['red'])){
                    if(isset($_GET['multicolor'])){
                        $searchRed = '';
                    }elseif(
                        !isset($_GET['multicolor'])&&
                        (isset($_GET['blue']))||
                        (isset($_GET['black']))||
                        (isset($_GET['red']))||
                        (isset($_GET['green']))
                    ){
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
                        $searchMultiColor = 'c=' 
                                            . $addBlack 
                                            . $addBlue 
                                            . $addGreen 
                                            . $addRed 
                                            . $addWhite
                                            . ' ';
                    }else{
                        $searchRed = 'c=r ';
                    }
                }

                // Search for blue cards

                if(isset($_GET['blue'])){
                    if(isset($_GET['multicolor'])){
                        $searchBlue = '';
                    }elseif(
                        !isset($_GET['multicolor'])&&
                        (isset($_GET['blue']))||
                        (isset($_GET['black']))||
                        (isset($_GET['red']))||
                        (isset($_GET['green']))
                    ){
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
                        $searchMultiColor = 'c=' 
                                            . $addBlack 
                                            . $addBlue 
                                            . $addGreen 
                                            . $addRed 
                                            . $addWhite
                                            . ' ';
                    }else{
                        $searchBlue = 'c=u ';
                    }
                }

                // Search for black cards

                if(isset($_GET['black'])){
                    if(isset($_GET['multicolor'])){
                        $searchBlack = '';
                    }elseif(
                        !isset($_GET['multicolor'])&&
                        (isset($_GET['blue']))||
                        (isset($_GET['black']))||
                        (isset($_GET['red']))||
                        (isset($_GET['green']))
                    ){
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
                        $searchMultiColor = 'c=' 
                                            . $addBlack 
                                            . $addBlue 
                                            . $addGreen 
                                            . $addRed 
                                            . $addWhite
                                            . ' ';
                    }else{
                        $searchBlack = 'c=b ';
                    }
                }

                // Search for white cards

                if(isset($_GET['white'])){
                    if(isset($_GET['multicolor'])){
                        $searchWhite = '';
                    }elseif(
                        !isset($_GET['multicolor'])&&
                        (isset($_GET['blue']))||
                        (isset($_GET['black']))||
                        (isset($_GET['red']))||
                        (isset($_GET['green']))
                    ){
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
                        $searchMultiColor = 'c=' 
                                            . $addBlack 
                                            . $addBlue 
                                            . $addGreen 
                                            . $addRed 
                                            . $addWhite
                                            . ' ';
                    }else{
                        $searchWhite = 'c=w ';
                    }
                }
                
                // Search for colorless cards

                // Since most cards have colorless mana, selecting multicolor wouldnt make any sense here
                // We still add extra safety so we don't get errors displayed.
                
                if(isset(
                    $_GET['colorless'])&&
                    ((isset($_GET['blue']))||
                    (isset($_GET['black']))||
                    (isset($_GET['red']))||
                    (isset($_GET['white']))||
                    (isset($_GET['green'])))
                    ){
                    $searchBlack = '';
                    $searchBlue = '';
                    $searchGreen = '';
                    $searchRed = '';
                    $searchWhite = '';
                    $searchColorless = 'c=c or ';
                }elseif(isset($_GET['colorless'])){
                    $searchColorless = 'c=c';
                }

                // Advanced card search
                
                // To search cards by their rarity
                
                if(isset($_GET['rarity'])){
                    $searchRarity = 'r:' . $_GET['rarity'] . ' ';
                }

                // To see cards that are considered legal in the desired format

                if(isset($_GET['format'])&&($_GET['format'] !== '')){
                    $searchFormat = 'f:' . $_GET['format'] . ' ';
                } else {
                    $searchFormat = '';
                }
                
                // Search cards by set or edition

                if(isset($_GET['set'])){
                    $searchFormat = 's:' . $_GET['set'] . ' ';
                }
                
                // The different type searches
                
                // Creature types
                
                if(
                    isset($_GET['creatureType'])&&
                    (isset($_GET['planeswalkerType'])||
                    isset($_GET['landType'])||
                    isset($_GET['artifactType'])||
                    isset($_GET['enchantmentType'])||
                    isset($_GET['spellType']))
                    ){
                    $chosenType = strtolower($_GET['creatureType']);
                    $searchCreatureType = 't:' . $chosenType . ' or ';
                }elseif (isset($_GET['creatureType'])) {
                    $chosenType = strtolower($_GET['creatureType']);
                    $searchCreatureType = 't:' . $chosenType . ' ';
                }
                
                // Planeswalker types
                
                if(
                    isset($_GET['planeswalkerType'])&&
                    (isset($_GET['landType'])||
                    isset($_GET['artifactType'])||
                    isset($_GET['enchantmentType'])||
                    isset($_GET['spellType']))
                ){
                    $chosenType = strtolower($_GET['planeswalkerType']);
                    $searchPlaneswalkerType = 't:' . $chosenType . ' or ';
                }elseif (isset($_GET['planeswalkerType'])){
                    $chosenType = strtolower($_GET['planeswalkerType']);
                    $searchPlaneswalkerType = 't:' . $chosenType . ' ';
                }
                
                // Land types
                
                if(
                    isset($_GET['landType'])&&
                    (isset($_GET['artifactType'])||
                    isset($_GET['enchantmentType'])||
                    isset($_GET['spellType']))
                ){
                    $chosenType = strtolower($_GET['landType']);
                    $searchLandType = 't:' . $chosenType . ' or ';
                }elseif(isset($_GET['landType'])){
                    $chosenType = strtolower($_GET['landType']);
                    $searchLandType = 't:' . $chosenType . ' ';
                }
                
                // Artifact types
                
                if(
                    isset($_GET['artifactType'])&&
                    (isset($_GET['enchantmentType'])||
                    isset($_GET['spellType']))
                ){
                    $chosenType = strtolower($_GET['artifactType']);
                    $searchArtifactType = 't:' . $chosenType . ' or ';
                }elseif(isset($_GET['artifactType'])){
                    $chosenType = strtolower($_GET['artifactType']);
                    $searchArtifactType = 't:' . $chosenType . ' ';
                }
                
                // Enchantment types
                
                if(
                    isset($_GET['enchantmentType'])&&
                    (isset($_GET['spellType']))
                ){
                    $chosenType = strtolower($_GET['enchantmentType']);
                    $searchEnchantmentType = 't:' . $chosenType . ' or ';
                }elseif(isset($_GET['enchantmentType'])){
                    $chosenType = strtolower($_GET['enchantmentType']);
                    $searchEnchantmentType = 't:' . $chosenType . ' ';
                }
                
                // Spell types
                
                if(isset($_GET['spellType'])){
                    $chosenType = strtolower($_GET['spellType']);
                    $searchSpellType = 't:' . $chosenType . ' ';
                }
                
                // Search by exact card name
                
                if(isset($_GET['cardName'])&&($_GET['cardName'] !== '')){
                    $searchCardName = "!'" . str_replace("'", ' ', $_GET['cardName']) . "'";
                }else{
                    $searchCardName = '';
                }
                
                // Search by converted Mana Cost
                
                if(isset($_GET['cmc'])&&($_GET['cmc'] !== '')){
                    $searchCMC = 'cmc=' . $_GET['cmc'] . ' ';
                }else{
                    $searchCMC = '';
                }
                
                // See the cards that have a foil version
                
                if(isset($_GET['foil'])){
                    $searchFoil = 'is:foil' . ' ';
                }
                
                // Setting parameters for ordering the results
                
                $chosenOrderBy = ($_GET['orderBy']);
                switch($chosenOrderBy){

                    // Alphabetical order ascending
                    
                    case 'orderAlphaAsc': $searchOrder = 'order=name&q='; 
                    break;
                    
                    // Alphabetical order descending
                    
                    case 'orderAlphaDesc': $searchOrder = 'order=name&dir=desc&q='; 
                    break;
                    
                    // Order by converted mana cost ascending
                    
                    case 'orderConvertedAsc': $searchOrder = 'order=cmc&dir=asc&q='; 
                    break;
                    
                    // Order by converted mana cost descending
                    
                    case 'orderConvertedDesc': $searchOrder = 'order=cmc&dir=desc&q='; 
                    break;
                    default: $searchOrder = 'order=name&q='; exit(); break;
                }
                
                // Encoding the final URL to make the API call and escaping whitespace
                
                $finalQuery = str_replace(' ', '%20', $baseUrl 
                    . $searchOrder
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
                
                // Set the options to retrieve all the asked cards and passing the final search url
                
                $opts = [
                    CURLOPT_URL => $finalQuery,
                    CURLOPT_RETURNTRANSFER => true,
                    // only needed for the first call inside the cardDisplay function
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ];
                
                // Run the call to the Api
                
                curl_setopt_array($curl, $opts);
                //var_dump($opts[CURLOPT_URL]); // To be deleted in production!

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
                    CURLOPT_URL => '{{$cards->next_page}}', // add correct url for display of next page
                    CURLOPT_RETURNTRANSFER => true,
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
            
            // Display some random cards on initialization
            
            else {
                $curl = curl_init();
                
                // Set the options to retrieve random cards
                $opts = [
                    CURLOPT_URL => $baseUrl,
                    CURLOPT_RETURNTRANSFER => true,
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

