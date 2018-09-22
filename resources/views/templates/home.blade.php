<div class="row">
  <div class="col-md-12"></div>
</div>
<div class="row">
  @foreach($posts as $post)
    <div class="col-md-4">
      <h2><a href="#">{{ $post->title }}</a></h2>
      <p>
        Posted by {{ $post->author->name }} on {{ $post->published_at }}
      </p>

      {!! $post->present()->excerptHtml !!}
    </div>
  @endforeach
</div>
