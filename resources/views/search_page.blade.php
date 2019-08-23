@extends('layouts.app')
@section('content')

<div id='searchLayoutCenter'>
    <div>
        @include('search')
    </div>
    <div id='cardContainer'>

        @if(isset($cards))

        @foreach($cards->data as $card)
        <div class='showCardS'>
            <?php



            if ($card->layout == 'transform') {
                $cardImages = $card->card_faces;
                $nameF = explode(' // ', $card->name);

                echo "<p id='cname'> $nameF[0] <br> $nameF[1]</p>";
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


                            ?><div id='addButtons'>
                        <button id='bAddToDeck' value="{{$card->id}}" name='bAddToDeck'>Add to a deck</button>
                        <button id='bAddToCollection' value="{{$card->id}}" name='bAddToCollection'>Add to collection</button>
                        @include('card.create')
                    </div><?php
                                    echo " </div>";
                                }

                                ?>



                </div>

                <div class="carousel-control-next" role="button">
                    <i class="fas fa-redo-alt"></i>
                </div>
            </div>
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
                echo "<p id='cname'> $card->name </p>";
                $cardImages = $card->image_uris;

                // images are set to small for development
                // Change it in the final display, options are small, normal, large and png
                // png would possibly be the best choice since it gets rid off the corners!
                // delete this comments after you are done!!!!
                echo '<img src="' . $cardImages->small . '">';
                ?><div id='addButtons'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" id='bAddToDeck' value="{{$card->id}}" name='bAddToDeck' data-target="#exampleModalCenter">
                    Add to a deck
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <button id='bAddToCollection' value="{{$card->id}}" name='bAddToCollection'>Add to collection</button>
                @include('card.create')</div><?php

                    } else {
                        echo "<p id='cname'>$card->name</p>";
                        $cardImages = 'No Image for this card provided';
                        echo $cardImages;
                        ?><div id='addButtons'>
                <button id='bAddToDeck' value="{{$card->id}}" name='bAddToDeck'>Add to a deck</button>
                <button id='bAddToCollection' value="{{$card->id}}" name='bAddToCollection'>Add to collection</button>
                @include('card.create')
            </div><?php

                    } ?>
        </div>
        @endforeach
        <?php
        if ($cards->has_more) {
            echo '<a href="' . $cards->next_page . '">Next Page</a>';
            echo '<form action="#" method="get"><input type="submit" value="NEXT PAGE" name="nextPage"></form>';
        }
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
    </div>
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
    });
</script>

@endsection