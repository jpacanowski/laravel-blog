@foreach($posts as $post)
<h2><a href="{{$post->slug}}">{{ $post->title }}</a></h2>
<p>{!! $post->body !!}</p>
@endforeach
