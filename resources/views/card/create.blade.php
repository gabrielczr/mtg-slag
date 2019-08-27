<section id='addButtons'>



  <form method="post" action="/card">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
    <input name="id" value="{{$card->id}}" type="hidden">

    <input id='bAddToCollection' type="submit" name='cAdd' value="Add to Collection">

  </form>

  <form method="post" action="/deck">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
    <input name="id" value="{{$card->id}}" type="hidden">

    <input id='bAddToDeck' type="submit" name='cAdd' value="Add to deck">

  </form>
</section>