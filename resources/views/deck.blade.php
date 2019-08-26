@extends('layouts.app')
@section('title', 'My Deck')


@section('content')
<h1 id='deckTitle'>My deck</h1>
<?php
$count = count($cardss) - 1;
?>
<div id='deckContainer' name='deckContainer'>
    @for($i=0;$i<=$count;$i++) <section class='showCardDeck'>
        <?php
        if ($cardss[$i][1]->layout == 'transform') {
            $cardImages = $cardss[$i][1]->card_faces;
            $nameF = explode(' // ', $cardss[$i][1]->name);
            echo "<p class='cnameD'> $nameF[0] / $nameF[1]</p>";

            ?>

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




                    </div>
                </div>


            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" id='bAddToDeck' value="{{$cardss[$i][1]->id}}" name='bAddToDeck' data-target="#exampleModalCenter">
                Add to a deck
            </button>

        </div>

        <form method="post" action="/deck/{{$cardss[$i][0]}}">
            @method('delete') @csrf


            <input class="del-deck" type="submit" value="x" />

        </form>
        <?php
        } elseif ($cardss[$i][1]->layout !== 'transform') {

            echo "<p class='cnameD'>" . $cardss[$i][1]->name . "</p>";


            ?>
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




                    </div>  
                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" id='bAddToDeck' value="{{$cardss[$i][1]->id}}" name='bAddToDeck' data-target="#exampleModalCenter">
                Add to a deck
            </button>

                </div>
 
            </div>

         

        </div>
        <form method="post" action="/deck/{{$cardss[$i][0]}}">
            @method('delete') @csrf


            <input class="del-deck" type="submit" value="x" />

        </form>
        <?php
        } else {
            echo "<p class='cnameD'>" . $cardss[$i][1]->name . "</p>";

            echo $cardImages; ?>
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




                    </div>
                </div>


            </div>
 <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" id='bAddToDeck' value="{{$cardss[$i][1]->id}}" name='bAddToDeck' data-target="#exampleModalCenter">
                Add to a deck
            </button>

           
        </div>
        <form method="post" class="form-deck" action="/deck/{{$cardss[$i][0]}}">
            @method('delete') @csrf


            <input class="del-deck" type="submit" value="x" />

        </form>
        <?php
        }
        ?>



        </section>
        @endfor
</div>



@endsection