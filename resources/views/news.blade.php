@extends('layouts.app')
@section('content')
<h1>News List</h1>
@foreach($posts as $post)
<h3>{{ $post->title }}</h3>
<p>{{ $post->summary }}</p>
<hr>
@endforeach
@endsection