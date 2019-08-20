@extends('layouts.app')

@section('content')
<section>

    @foreach($cards->data as $card)
    <div>
        <p>{{ $card->name }}</p>
        <?php
        if ($card->layout == 'transform') {
            $cardImages = $card->card_faces;
            foreach ($cardImages as $cardImage) {
                // images are set to small for development
                // Change it in the final display, options are small, normal, large and png
                // png would possibly be the best choice since it gets rid off the corners!
                // delete this comments after you are done!!!!
                echo '<img src="' . $cardImage->image_uris->small . '">';
            }
        } elseif ($card->layout !== 'transform') {
            $cardImages = $card->image_uris;
            // images are set to small for development
            // Change it in the final display, options are small, normal, large and png
            // png would possibly be the best choice since it gets rid off the corners!
            // delete this comments after you are done!!!!
            echo '<img src="' . $cardImages->small . '">';
            echo 'Card ID = ' . $card->id;
        } else {
            $cardImages = 'No Image for this card provided';
            echo $cardImages;
        } ?>
    </div>
    @include('card.create')

    @endforeach
    <?php
    if ($cards->has_more) {
        echo '<a href="' . $cards->next_page . '">Next Page</a>';
        echo '<form action="#" method="get"><input type="submit" value="NEXT PAGE" name="nextPage"></form>';
    }
    ?>

</section>