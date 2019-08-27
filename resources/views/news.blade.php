<link rel='stylesheet' href="{{mix('/css/news.css')}}">
@extends('layouts.app')
@section('title', 'Latest News')


@section('content')
<div id='newsCreate'>
    <h1 id="newsTitle">Latest News </h1>




@if(Auth::check() && Auth::user()->type == 'admin')<a id='adminNews' href="news/create">Add New</a>@endif
@foreach($posts as $post)
</div>

<!--class="{{$post->category}}"-->

<div id="newsDiv">

<div id="newsMain">
    <article id="newsArticle">
		<div>
        <img id="newsImage" width="100%" src="/storage/images/{{ $post->image }}" />
		</div>
        <div id='newsContent'>
           <h2>{!!html_entity_decode($post->title)!!}</h2>
           <p>{!!html_entity_decode($post->summary)!!} |
           <a href="/post/show/{{$post->id}}"> Read more</a> |</p>

        </div>
        
    </article>

    </div>
    
        <!-- Show details of the new -->
        
        <!-- comment on this new 
        <a href="/post/{{$post->id}}/edit">Comment</a> |
         share with contacts 
        <a href="/post/{{$post->id}}/edit">Share</a> |-->

</div>

@endforeach
@endsection