@extends('layouts.app')

@section('content')
<section id='searchColumn'>
    <form action="" id='searchForm'>
        <!--card name-->
        <div class='select card-body'>
        <label for="name" id='labelName'>Card name</label>
        <input type="text" id='name'>
        
        <!--list of mana colors-->
        <div id='colors'>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='white'>
                </div>
            </div>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='black'>
                </div>
            </div>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='blue'>
                </div>
            </div>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='white'>
                </div>
            </div>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='green'>
                </div>
            </div>
            <div class='colorCheck'>
                <div class='color'>
                    <img src="" alt="">
                    <input type="checkbox" name='colorless'>
                </div>
            </div>
        </div><div id='labelFoil'>
        <label for="foil">Foil</label>
        <input type="checkbox" name='foil'>
        </div>
        <!-- Allow multicolor-->
        <div id='multicolorLabel'>
        <label>Show only multicolor </label>
        <input type="checkbox" name='multicolor'>
    </div>
        <!-- Converted mana cost-->
        <div id='cmc'>
        <label for="cmc">Converted mana cost</label>
        <input type="number" name='cmc'>
    </div></div>
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

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">


                        <div class='select'>
                            <label for="rarity">Rarity</label>
                            <select name='rarity'>
                                <option value="" selected="true" disabled="disabled"></option>
                                <option name='common' value="Common"></option>
                                <option value="uncommon">uncommon</option>
                                <option value="rare">rare</option>
                                <option value="rare">mythic rare</option>
                                <option value="rare">legendary</option>
                            </select>
                        </div>

                        <div class='select'>
                            <label for="set">Set</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Format</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Creature type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Planeswalker type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Land type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Artifact type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Enchant type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                        <div class='select'>
                            <label for="set">Spell type</label>
                            <select name='set'>
                                <option value="" selected="true" disabled="disabled">
                                    <!-- query to populate the type -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

</section>
@endsection