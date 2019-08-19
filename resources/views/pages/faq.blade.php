@include('layouts.header')



<div>
  <h2>{{$page->title}}</h2>
  {!!html_entity_decode($page->content)!!}
</div>