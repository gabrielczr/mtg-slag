<div id='asideCollection'>
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

        <div class="card-body collapse hide" id='showDecks'>
            <h5 class="card-title">Your deck</h5>
            @include('show_deck')
            <p class="card-text">show decks</p>
            <a href="#" class="btn btn-primary">New Deck</a>
        </div>

        <div class="card-body " id='showCollection'>
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">Show collection</p>


            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
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