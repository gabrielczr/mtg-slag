<link rel='stylesheet' href="{{mix('/css/profile.css')}}">
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

  <div class="row justify-content-center">

    <div class="profile-header-container">
      <div class="profile-header-img">
        <img id="profileAvatar" src="/storage/avatars/{{ $user->avatar }}" />

        <!-- badge -->
        <div class="rank-label-container">
          <span class="label label-default rank-label">
            <h5 id="profileH5">{{$user->name}}</h3>
          </span>
        </div>
        <!--<div class="rank-label-container">
          <span class="label label-default rank-label">Add/Change Avatar</span>
        </div>-->
      </div>
    </div>

  </div>
  
  <div class="row justify-content-center">
    <form action="/profile" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

<div>
      <button>Decks</button>
      <div class="deckList">
        <div id="customDeck">
          <a href="#">Grixis</a><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        <div id="customDeck">
          <a href="#">Jund</a><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        <div id="addDeck">
          <a href="#">Add</a><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        
      </div>
      <button>Collection</button>
</div>

<div class="profileNews">
    <h3>News Submited</h3>
    @foreach($posts as $post)
    <li> {{ $post->id }}: {{ $post->title }}</li>
    @endforeach
  </div>
</div>
@endsection