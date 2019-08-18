@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Tester</div>
                @if(Auth::check())
                <!-- Table -->
                <h2> Test to be seen by authenticated user</h2>
                @endif
            </div>
            @if(Auth::guest())
            <a href="/login" class="btn btn-info"> You need to login ></a>
            @endif
        </div>
    </div>
</div>
@endsection