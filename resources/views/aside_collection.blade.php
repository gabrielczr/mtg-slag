<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link" id='collectionB' href="#">Collection</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id='decksB' href="#">Decks</a>
            </li>

        </ul>
    </div>

    <div class="card-body" id='showDecks'>
        <h5 class="card-title">Your decks</h5>
        <!-- @forech($decks as $deck)}{
        ?>
        <div class='deckLine'>
          <div id='infoDeck'>
            <span>
              <p id='dlName'>{{$deck->name}}<p>
            </span>
            <span>
                <p id='cardNumber'>{{$deck->cardN}}/60</p>
            </span>
            <div id='dlColors'>
              @foreach($deck->colors as $color){
                  @if($color=='red')
                 <img src={{URL::asset('img/red.png')}}
                  @endif
                  @if($color=='white')
                 <img src={{URL::asset('img/white.png')}}
                 @endif
                 @if($color=='black')
                 <img src={{URL::asset('img/black.png')}}
                 @endif
                 @if($color=='green')
                 <img src={{URL::asset('img/green.png')}}
                 @endif
                 @if($color=='blu')
                 <img src={{URL::asset('img/blu.png')}}
                 @endif
              }  
              @endforeach
            </div>
          <div>
            <button id='deleteDeck' value="{{$deck->id}}">Delete this deck </button>
           </div>
         </div>
    }
   @endforeach
-->
        <p class="card-text">show decks</p>
        <a href="#" class="btn btn-primary">New Deck</a>
    </div>
    
    <div class="card-body" id='showCollection'>
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">Show collection</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#collectionB").click(function(e) {
            e.preventDefault();
            $("#showDecks").css("display", "none");
            $("#showCollection").css("display", "initial");

        });
        $("#decksB").click(function(e) {
            e.preventDefault();
            $("#showDecks").css("display", "initial");
            $("#showCollection").css("display", "none");
        });
        $("#deleteDeck").click(function(e) {
           
        });

    });
</script>