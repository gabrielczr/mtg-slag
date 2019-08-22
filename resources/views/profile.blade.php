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
        <img id="profileAvatar" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/525c1fe9-f567-4d9a-a961-b6726857cb5d/d81xsu9-9319dce6-e4be-4103-ade4-1939bd6aa033.jpg/v1/fill/w_788,h_1014,q_70,strp/kirua_6__hxh__by_acetaris_d81xsu9-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MjA2MCIsInBhdGgiOiJcL2ZcLzUyNWMxZmU5LWY1NjctNGQ5YS1hOTYxLWI2NzI2ODU3Y2I1ZFwvZDgxeHN1OS05MzE5ZGNlNi1lNGJlLTQxMDMtYWRlNC0xOTM5YmQ2YWEwMzMuanBnIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.tI9mm8jrQgmUy6tOkL-mj_zeNwekvqPDU0PlamlsRuo" />

        <!--<img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />-->
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
  <!--
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
-->
<div>
      <button class="profileButtons">Collection</button>
      <button class="profileButtons">Decks</button>
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
      
</div>
<!--
<div class="profileNews">
    <h3>News Submited</h3>
    @foreach($posts as $post)
    <li> {{ $post->id }}: {{ $post->title }}</li>
    @endforeach
  </div>
</div>
-->
@endsection