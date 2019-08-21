
<link rel='stylesheet' href="{{mix('/css/profile.css')}}">
@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    <div class="py-4">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <profile>
            @if(Auth::check())
            <div class='panel panel-default'>
              You are logged in! as <strong>{{ strtoupper(Auth::user()->type) }}</strong>
            </div>
            <div class='panel panel-default'>
              Welcome <strong>{{ strtoupper(Auth::user()->name) }}</strong>
            </div>
            @endif
          </profile>
        </div>
      </div>
    </div>
    @extends('profile.shows')

    @endsection
  </div>
</div>