@extends('layouts.app')
@section('title', $page->title)

@section('content')
<div id='pageContent'>
<h2>{{$page->title}}</h2>
{!!html_entity_decode($page->content)!!}
</div>
@endsection