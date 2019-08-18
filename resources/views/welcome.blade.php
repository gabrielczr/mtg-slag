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
        </div>
    </div>
</div>

@if(Auth::check())
<div class='panel panel-default'>
    You are logged in! as <strong>{{ strtoupper(Auth::user()->type) }}</strong>
</div>
@endif


<div class='panel panel-default'>
    Admin Page: <a href='{{ url('/') }}/admin'>{{ url('/') }}/admin</a>
</div>


<div class='panel panel-default'>
    Member Page: <a href='{{ url('/') }}/editor'>{{ url('/') }}/editor</a>
</div>

@endsection

