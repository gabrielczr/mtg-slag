<link rel='stylesheet' href="{{mix('/css/news.css')}}">
@extends('layouts.app')
@section('title', 'Latest News')


@section('content')
<h1 id="newsTitle">Last News</h1>
@foreach($posts as $post)

<!--class="{{$post->category}}"-->
<div id="newsDiv">   
        <article id="newsArticle">
            <div>
                {!!html_entity_decode($post->title)!!}
            </div>
            <p>{!!html_entity_decode($post->summary)!!}</p>
        </article>
        
</div>
        <div id="newsLinks">
            <!-- Show details of the new -->
            <a href="/post/show/{{$post->id}}">Read more</a> |
            <!-- Edit this new -->
            <a href="/post/{{$post->id}}/edit">Edit</a>
            
            <script>
                let color2= $("#newsTitle").attr("class");
                $("#newsLinks").addClass($color2);
            </script>

        </div>

<!-- <p>{!!html_entity_decode($post->content)!!}</p> -->
<hr>
@endforeach
@endsection