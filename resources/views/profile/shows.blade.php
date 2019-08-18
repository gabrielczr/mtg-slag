@yield('news')
<h2>User: {{ Auth::user()->id }} - {{ Auth::user()->email}}</h2>
<br />
<h2>Posts:</h2>

@foreach($posts as $post)
<p> {{ $post->id }}: {{ $post->title }}</p>
@endforeach