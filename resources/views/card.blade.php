@extends('layouts.app')
@section('title', 'Collection')


@section('content')
<h1>My Collection</h1>
@foreach($cards as $card)
<h3>{{ $card->name, $card->id }}</h3>
<h3>{{ $data->name, $data->id }}</h3>

<img src="{{ $data->image_uris->small}}">
@endforeach






@endsection