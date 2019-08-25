<section id='addButtons'>


  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add to deck</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">




          <section class='showCardS'>
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
                    echo '<img class="d-block w-90" src="' . $cardImage->image_uris->large . '">';

                    echo '</div>';
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
              echo '<img src="' . $cardImages->large . '">';

              ?>


            <?php

            } else {
              echo "<p id='cname'>$card->name</p>";
              $cardImages = 'No Image for this card provided';
              ?>

            <?php } ?>

          </section>



        </div>

        <div class="modal-footer">
          <div id='bChooseD'>
            <form action="">@csrf
              <label value="">ammount</label>
              <input type="number">
          </div>

          <button type="button" class="btn btn-primary">Save</button>

          </form>

        </div>

      </div>

    </div>
  </div>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" id='bAddToDeck' value="{{$card->id}}" name='bAddToDeck' data-target="#exampleModalCenter">
    Add to a deck
  </button>

  <form method="post" action="/card">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
    <input name="id" value="{{$card->id}}" type="hidden">

    <input id='bAddToCollection' type="submit" name='cAdd' value="Add to Collection">

  </form>
</section>