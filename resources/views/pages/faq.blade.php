@extends('layouts.app')
@section('title', $page->title)

@section('content')
<h2>{{$page->title}}</h2>
{!!html_entity_decode($page->content)!!}
@endsection