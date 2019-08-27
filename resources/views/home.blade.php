@extends('layouts.app')

@section('content')



  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif <div>
    <button id='bSearch' class='buttonCustom' name='bSearch'> <a href="/search"> Search!</a></button>
  </div>
  <div class="card-deck">
    @foreach($postsN as $post)
   
    <div class="card">
      <img class="card-img-top" width="100%" src="/storage/images/{{ $post->image }}" alt="Card image cap">
      <div class="card-body">
      
        <h5 class="card-title"> {!!html_entity_decode($post->title)!!}</h5>
        <p class="card-text">
          {!!html_entity_decode($post->summary)!!}
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted">
          <div id="newsLinks">
            <!-- Show details of the new -->
            | <a href="/post/show/{{$post->id}}"> Read more</a> |
            <!-- comment on this new 
            <a href="/post/{{$post->id}}/edit">Comment</a> |
            share with contacts 
            <a href="/post/{{$post->id}}/edit">Share</a> |-->
          </div>
        </small>
      </div>
    </div>

    @endforeach
  </div>



<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


            </div>
        </div>
    </div>
    -->
@endsection