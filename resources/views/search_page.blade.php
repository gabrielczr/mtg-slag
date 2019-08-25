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
                                echo '<img class="d-block w-90" src="' . $cardImage->image_uris->small . '">';

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

                    //     foreach ($cardImages as $cardImage) {
                    // images are set to small for development
                    // Change it in the final display, options are small, normal, large and png
                    // png would possibly be the best choice since it gets rid off the corners!
                    // delete this comments after you are done!!!!
                    //       echo "<p id='cname'> $card->name </p>";
                    //     echo '<img src="' . $cardImage->image_uris->small . '">';
                    //   $c++;
                    // }
                } elseif ($card->layout !== 'transform') {
                    echo "<p class='cname'> $card->name </p>";
                    $cardImages = $card->image_uris;

                    // images are set to small for development
                    // Change it in the final display, options are small, normal, large and png
                    // png would possibly be the best choice since it gets rid off the corners!
                    // delete this comments after you are done!!!!
                    echo '<img src="' . $cardImages->small . '">';

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

        <form action='/searchResoult/more' method='get'> @csrf
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



    });
</script>

@endsection