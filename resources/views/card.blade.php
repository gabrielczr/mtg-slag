@extends('layouts.app')
@section('title', 'Collection')


@section('content')
<h1>My Collection</h1>

<?php //dd($cardss);
?>

@foreach($cardss as $card)

<h3>{{ $card->name}}</h3>
<img src="{{$card->image_uris}}

<?php
//<img src="{{ URL::asset($card->image_uris)}}">

?>
<form action=" {{ route('card.destroy', $card['id']) }}" method="POST">
@method('DELETE')
@csrf
<button>Delete Card</button>
</form>

@endforeach



@endsection