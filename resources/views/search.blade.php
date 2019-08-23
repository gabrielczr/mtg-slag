<section id='searchColumn'>

    <form action="/searchResults" method="get">@csrf
        <!--card name-->
        
        <div class='select card-body'>
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collap" aria-expanded="true" aria-controls="collapseOne">
            Search Card
        </button>
            <div id="collap" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class='select'>
                <label for="orderBy">Order by</label>
                <select name="orderBy" id="">
                    <option value="orderAlphaAsc" name="orderAlphaAsc">Alphabetical A/z</option>
                    <option value="orderAlphaDesc" name="orderAlphaDesc">Alphabetical z/A</option>
                    <option value="orderConvertedAsc" name="orderConvertedAsc">Converted mana cost -/+</option>
                    <option value="orderConvertedDesc" name="orderConvertedDesc">Converted mana cost +/-</option>
                </select>
            </div>
            <label for="name" id='labelName'>Card name</label>
            <input type="text" id='name' name="cardName">

        <!--list of mana colors-->
       
            <div id='colors'>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/white.png')}}" alt="white mana icon">
                        <input type="checkbox" name='white'>
                    </div>
                </div>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/black.png')}}" alt="black mana icon">
                        <input type="checkbox" name='black'>
                    </div>
                </div>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/blue.png')}}" alt="blue mana icon">
                        <input type="checkbox" name='blue'>
                    </div>
                </div>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/red.png')}}" alt="red mana icon">
                        <input type="checkbox" name="red">
                    </div>
                </div>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/green.png')}}" alt="green mana icon">
                        <input type="checkbox" name='green'>
                    </div>
                </div>
                <div class='colorCheck'>
                    <div class='color'>
                        <img class='mana' src="{{URL::asset('img/colorless.png')}}" alt="colorless mana icon">
                        <input type="checkbox" name='colorless'>
                    </div>
                </div>
            </div>



            <div id='labelFoil'>
                <label for="foil">Foil</label>
                <input type="checkbox" name='foil'>
            </div>
            <!-- Allow multicolor-->
            <div id='multicolorLabel'>
                <label>Show multicolored only: </label>
                <input type="checkbox" name='multicolor'>
            </div>
            <!-- Converted mana cost-->
            <div id='cmc'>
                <label for="cmc">Converted mana cost</label>
                <input type="number" name='cmc'>
            </div>
            <input type="submit" value="SEARCH" name="search">
        </div>
        </div>
        <!-- show extra options-->
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Advanced search
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">


                        <div class='select'>
                            <label for="rarity">Rarity:</label>
                            <select name='rarity'>
                                <option value="" selected="true" disabled="abled"></option>
                                <option name="common" value="common">common</option>
                                <option value="uncommon">uncommon</option>
                                <option value="rare">rare</option>
                                <option value="mythic">mythic</option>


                            </select>
                        </div>
                        <?php
                        session_start();

                        if (!empty($sets)) {
                            $_SESSION['sets'] = $sets;
                        } else {
                            $sets = $_SESSION['sets'];
                        }             ?>



                        <div class='select'>
                            <label for="set">Set:</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                    @foreach($sets->data as $sets)
                                <option value="{{ $sets->code }}">{{ $sets->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>
                            <label for="format">Format:</label>
                            <select name='format'>
                                <option value="standard" selected="true">Standard</option>
                                <option value="modern" selected="true">Modern</option>
                                <option value="vintage" selected="true">Vintage</option>
                                <option value="commander" selected="true">Commander</option>
                                <option value="legacy" selected="true">Legacy</option>
                                <option value="brawl" selected="true">Brawl</option>
                                <option value="future" selected="true">Future Standard</option>
                                <option value="pauper" selected="true">Pauper</option>
                                <option value="penny" selected="true">Penny Dreadful</option>
                                <option value="duel" selected="true">Duel Commander</option>
                                <option value="oldschool" selected="true">Old School</option>
                                <option value="" selected="true" disabled="disabled"></option>

                            </select>
                        </div>
                        <div class='select'>
                            <?php
                            if (!empty($creatureTypes)) {
                                $_SESSION['creatureTypes'] = $creatureTypes;
                            } else {
                                $creatureTypes = $_SESSION['creatureTypes'];
                            }             ?>


                            <label for="creatureType">Creature type:</label>
                            <select name='creatureType'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                @foreach($creatureTypes->data as $creatureType)

                                    <option name="creatureType" value="{{ $creatureType }}">{{ $creatureType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>

                            <?php
                            if (!empty($planeswalkerTypes)) {
                                $_SESSION['planeswalkerTypes'] = $planeswalkerTypes;
                            } else if (!empty($_SESSION['planeswalkerTypes'])) {
                                $planeswalkerTypes = $_SESSION['planeswalkerTypes'];
                            }             ?>

                            <label for="planeswalkerType">Planeswalker type:</label>
                            <select name='planeswalkerType'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                @foreach($planeswalkerTypes->data as $planeswalkerType)
                                <option value="{{ $planeswalkerType }}">{{ $planeswalkerType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>
                            <?php
                            if (!empty($landTypes)) {
                                $_SESSION['landTypes'] = $landTypes;
                            } else if (!empty($_SESSION['landTypes'])) {
                                $landTypes = $_SESSION['landTypes'];
                            }             ?>
                            <label for="landType">Land type:</label>
                            <select name='landType'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                @foreach($landTypes->data as $landType)
                                <option value="{{ $landType }}">{{ $landType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>


                            <?php
                            if (!empty($artifactTypes)) {
                                $_SESSION['artifactTypes'] = $artifactTypes;
                            } else if(!empty($_SESSION['artifactTypes'])){
                                $artifactTypes = $_SESSION['artifactTypes'];
                            }             ?>

                            <label for="artifactType">Artifact type:</label>
                            <select name='artifactType'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                @foreach($artifactTypes->data as $artifactType)
                                <option value="{{ $artifactType }}">{{ $artifactType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>

                            <?php
                            if (!empty($enchantmentTypes)) {
                                $_SESSION['enchantmentTypes'] = $enchantmentTypes;
                            } else if(!empty($_SESSION['enchantmentTypes'])){
                                $enchantmentTypes = $_SESSION['enchantmentTypes'];
                            }             ?>
                            <label for="enchantmentType">Enchantment type:</label>
                            <select name='enchantmentType'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                                @foreach($enchantmentTypes->data as $enchantmentType)
                                <option value="{{ $enchantmentType }}">{{ $enchantmentType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='select'>

                            <?php
                            if (!empty($spellTypes)) {
                                $_SESSION['spellTypes'] = $spellTypes;
                            } else if(!empty($_SESSION['spellTypes'])){
                                $spellTypes = $_SESSION['spellTypes'];
                            }             ?>
                            <label for="spellType">Spell type:</label>
                            <select name='spellType'>
                                <option value="" selected="true" disabled="disabled">

                                <option value="instant" name="instant">Instant</option>
                                <option value="sorcery" name="sorcery">Sorcery</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="SEARCH" name="search">
        </div>

    </form>

</section>