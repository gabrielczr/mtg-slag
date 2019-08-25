@extends('layouts.app')
@section('title', 'Collection')


@section('content')
<?php
$count = count($cardss) - 1;
?>
<h1 id='collectionTitle'>My Collection</h1>
<div id='cardContainer' name='collectionContainer'>
   @for($i=0;$i<=$count;$i++) <section class='showCardS'>
      <?php
      if ($cardss[$i][1]->layout == 'transform') {
         $cardImages = $cardss[$i][1]->card_faces;
         $nameF = explode(' // ', $cardss[$i][1]->name);
         echo "<p class='cname'> $nameF[0] <br> $nameF[1]</p>";  ?>


      <div id="carouselExampleControls<?php echo $cardss[$i][1]->name; ?>" class="carousel slide carousel-fade" data-ride="carousel">

         <div class="carousel-inner">


            <?php $face = true;
               foreach ($cardImages as $cardImage) {
                  if ($face) {
                     echo " <div class='carousel-item active'>";
                     $face = false;
                  } else {
                     echo " <div class='carousel-item'>";
                  }
                  echo '<img class="d-block w-90" src="' . $cardImage->image_uris->small . '"></div>';
               }
               ?>
         </div>
         <div class="carousel-control-next" role="button">
            <i class="fas fa-redo-alt"></i>
         </div>
      </div>

      <form method="post" action="/card/{{$cardss[$i][0]}}">
         @method('delete') @csrf


         <input class="btn btn-default" type="submit" value="Delete" />

      </form>
      <?php
      } elseif ($cardss[$i][1]->layout !== 'transform') {
         echo "<p class='cname'>" . $cardss[$i][1]->name . "</p>";
         $cardImages = $cardss[$i][1]->image_uris;

         // images are set to small for development
         // Change it in the final display, options are small, normal, large and png
         // png would possibly be the best choice since it gets rid off the corners!
         // delete this comments after you are done!!!!
         echo '<img class="d-block w-90" src="' . $cardImages->small . '">';
         ?>

      <form method="post" action="/card/{{$cardss[$i][0]}}">
         @method('delete') @csrf


         <input class="btn btn-default" type="submit" value="Delete" />

      </form>
      <?php
      } else {
         echo "<p class='cname'>" . $cardss[$i][1]->name . "</p>";
         $cardImages = 'No Image for this card provided';
         echo $cardImages; ?>
      <form method="post" action="/card/{{$cardss[$i][0]}}">
         @method('delete') @csrf


         <input class="btn btn-default" type="submit" value="Delete" />

      </form> <?php
               }
               ?>



      </section>
      @endfor
</div>
@endsection