<form method="post" action="/card">
  @csrf
  <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
  <input name="id" value="{{$card->id}}" type="hidden">
  <button id='bAddToCollection'><input type="submit" value="Add to Collection"></button>
  <?php

  ?>
</form>