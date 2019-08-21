@extends('layouts.app')
@section('title', 'Latest News')


@section('content')
<h1>News List</h1>
@foreach($posts as $post)
<h3>{{ $post->title }}</h3>

<p>{!!html_entity_decode($post->summary)!!}</p>
<!-- Show details of the book -->
<a href="/post/show/{{$post->id}}">Read more...</a> |
<!-- Edit this book -->
<a href="/post/{{$post->id}}/edit">edit
</a>

<!-- <p>{!!html_entity_decode($post->content)!!}</p> -->
<hr>
@endforeach
@endsection