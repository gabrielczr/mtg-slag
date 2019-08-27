<link rel='stylesheet' href="{{mix('/css/profile.css')}}">


<!--TEST link-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@extends('layouts.app')
@section('title', 'Profile')


@section('content')
<div class="container ">
  <div class="row ">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>

  <div style="margin-left:0.3rem" class="row justify-content-left">

    <div class="profile-header-container">
      <div class="profile-header-img">
        <img onclick="document.getElementById('id01').style.display='block'" id="profileAvatar" src="/storage/avatars/{{ $user->avatar }}" />


        <!-- badge -->
        <div class="rank-label-container">
          <span class="label label-default rank-label">
            <h3 class="profileH3">{{$user->name}}</h3>
            <h6 class="profileH6">{{$user->type}}</h6>
            <h5 class="profileH5">{{$user->email}}</h5>
            <h5 class="profileH5" style="color: black">You are with us from: </h5>
            <h5 class="profileH5">{{$user->created_at}}</h5>
          </span>
        </div>


        <!--TEST-->


        <div class="w3-container">
          <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4">
              <header class="w3-container w3-teal">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h2>Modal Header</h2>
              </header>
              <div class="w3-container">
                <div class="row justify-content-center">
                  <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                      <input name='avatar' type="file" id="file" />
                      <label for="file" >choose a file</label>


                      <input class="menuButtons" type="file" name="avatar">
                      <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                    </div>
                    <button type="submit" class="menuButtons">Submit</button>
                  </form>
                </div>
              </div>
              <footer class="w3-container w3-teal">
                <p>Modal Footer</p>
              </footer>
            </div>
          </div>
        </div>

        <script>
          // Get the modal
          var modal = document.getElementById('id01');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>








        <!--<div class="rank-label-container">
          <span class="label label-default rank-label">Add/Change Avatar</span>
        </div>-->
      </div>
    </div>

  </div>



  <div>


    <button class="profileButtons">Collection</button>

    <button class="profileButtons">Deck</button>
    <div class="deckList">

      <div class="customDeck">
        <a href="/deck">Grixis</a><button type="button" class="close" data-dismiss="alert">×</button>
      </div>

    </div>

  </div>

  <div class="profileNews">
    <h3>News Submited</h3>
    @foreach($posts as $post)

    <a href="admin/post/{{$post->id}}/edit">Edit NEW</a>
    <li> {{ $post->id }}: {{ $post->title }}</li>

    @endforeach
  </div>
</div>

@endsection