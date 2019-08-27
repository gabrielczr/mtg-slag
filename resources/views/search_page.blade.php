@extends('layouts.app')
@section('content')

<div id='searchLayoutCenter'>
    <div id='searchColumn'>
        @include('search')
    </div>

    @if(isset($cards) && isset($cards->data))
    <section id='loginOnSearch'>
        @guest
        <div id='loginReminder'>

            <p>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                or @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                to add cards to your deck and collection!
            </p>
        </div>
        @endif
        @endguest

        <article id='cardContainer'>

            @foreach($cards->data as $card)
            <section class='showCardS'>
                <?php
                if ($card->layout == 'transform') {
                    $cardImages = $card->card_faces;
                    $nameF = explode(' // ', $card->name);
                    echo "<p class='cname'> $nameF[0] <br> $nameF[1]</p>";
                    ?>
                <div id="carouselExampleControls<?php echo $card->name; ?>" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $face = true;
                            foreach ($cardImages as $cardImage) {

                                // images are set to small for development
                                // Change it in the final display, options are small, normal, large and png
                                // png would possibly be the best choice since it gets rid off the corners!
                                // delete this comments after you are done!!!!
                                if ($face) {
                                    echo " <div class='carousel-item active'>";
                                    $face = false;
                                } else {
                                    echo " <div class='carousel-item'>";
                                }
                                echo '<img class="d-block w-90" src="' . $cardImage->image_uris->large . '">';

                                echo '</div>';
                            }
                            ?>

                    </div>
                    <div class="carousel-control-next" role="button">
                        <i class="fas fa-redo-alt"></i>
                    </div>
                </div>

                @if(Auth::check())
                @include('card.create')
                @endif
                <?php

                } elseif ($card->layout !== 'transform') {
                    echo "<p class='cname'> $card->name </p>";
                    $cardImages = $card->image_uris;

                    // images are set to small for development
                    // Change it in the final display, options are small, normal, large and png
                    // png would possibly be the best choice since it gets rid off the corners!
                    // delete this comments after you are done!!!!
                    echo '<img src="' . $cardImages->large . '">';

                    ?>
                @if(Auth::check())
                @include('card.create')
                @endif

                <?php

                } else {
                    echo "<p class='cname'>$card->name</p>";
                    $cardImages = 'No Image for this card provided';
                    echo $cardImages;
                    ?>

                @if(Auth::check())
                @include('card.create')
                @endif <?php } ?>

            </section>
            @endforeach

        </article>
        <?php
        if ($cards->has_more) {
            //  echo '<form <a href="' ."searchResoult/$cards->next_page" . '">Next Page</a> ';
            ?>

        <form action='/searchResoult' method='get'> @csrf
            <input type='submit' value="$cards->next_page" name='nextPage'>
        </form>
        <?php }
        ?>


        @else
        <div id='searchSuggestion'>
            <p>
                Search your card here
            </p>
            <i class="fas fa-arrow-circle-left"></i>
            <p>
                And add it to your collection or decks!
            </p>
            <i class="fas fa-arrow-circle-right"></i>
        </div>
        @endif
    </section>


    <div id='showC'>
        @include('aside_collection')
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(function() {

        $('.carousel-control-next').click(function(e) {
            e.preventDefault();
            $('.carousel').carousel('pause');
            $('.carousel').carousel('next');


        });

        $('#addToCollection').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/card',
                type: 'post',
                data: $('#myForm').serialize(),
                success: function() {
                    alert("worked");
                }
            });

        })



        $('#search-box').keyup(function() {
            $('#suggestion-box').html('');
            $filter = $('#search-box').val();
            $filter = $filter.toLowerCase();

            $.ajax({

                url: 'https://api.scryfall.com/catalog/card-names',

                type: 'get',

                data: 'keyword=' + $filter,

                success: function(result) {

                    $data = result['data'];



                    $ammount = result['total_values'];
                    // $resoults = array();
                    $i = 0;
                    
                    for ($i = 0; $i < $ammount - 1; $i++) {
                        $boxName = $data[$i].toLowerCase();
                        if ($boxName.indexOf($filter) != -1) {
                            // $resoults.add($data[$i]);
                            $('#suggestion-box').append("<div id='suggContainer'><a href='#' value='" + $data[$i] + " ' class='data'>" + $data[$i] + "</a></div><br id='breaklist'>");
                            $('#suggestion-box').css('display', 'flex');
                            $('#suggestion-box').css('flex-direction', 'column');

                        }

                    }

                    $('.data').click(function(e) {
                        e.preventDefault();
                        $('#search-box').val($(this).html());
                        $('#suggestion-box').html('');
                        $('#suggestion-box').css('display','none');
                    });
                    //   $('#suggesstion-box').html("<p id='nameSuggestion'></p>")
                },
                error: function(err) {

                    // Si une erreur AJAX se produit

                    console.log('FUCKING ERROR');

                }

            });



        });


    });
</script>


@endsection