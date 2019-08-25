@if(Auth::check())
            <div id='addButtons'>


                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add to a deck</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="' . $cardImages->big . '">
                            </div>
                            <div class="modal-footer">
                                <div id='bChooseD'>
                                    <label value="">Choose a deck</label>
                                    <select class="btn btn-secondary">


                                        <option value="">first</option>
                                        <option value="">second</option>
                                        <option value="">third</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary">Save</button>
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

                    <input id='bAddToCollection' type="submit" value="Add to Collection">

                </form>
            </div>@endif







            //!!!

            <?php
    if ($cards->has_more) {
        echo '<a href="' . $cards->next_page . '">Next Page</a>';
        echo '<form action="#" method="get"><input type="submit" value="NEXT PAGE" name="nextPage"></form>';
    }
    ?>