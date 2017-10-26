@foreach($posts as $post)
  <article>
    <h2><a href="{{ route('blog.post', [$post->id, $post->slug])}}">{{ $post->title }}</a></h2>
    <p>
      Posted by {{ $post->author->name }} on {{ $post->published_at }}
    </p>

    {!! $post->present()->excerptHtml or $post->present()->bodyHtml !!}
  </article>
@endforeach

{!! $posts->render() !!}
