@extends('layouts.backend')

@section('title', 'Edit ' . $page->title)

@section('content')
  <form class="" action="{{ route('backend.pages.update', $page->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}



    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" name="title" type="text" value="{{ $page->title }}">
    </div>

    <div class="form-group">
      <label for="uri">URI</label>
      <input class="form-control" name="uri" type="text" value="{{ $page->uri }}">
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" name="name" type="text" value="{{ $page->name }}">

      <p class="help-block">
        This name is used to generate links to the page.
      </p>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="template">Template</label>
      </div>
      <div class="col-md-4">
        <select class="form-control" name="template" id="template">
          @foreach ($templates as $t)
            <option value="{{$t}}"
            @if($page->template == $t)
              selected="selected"
            @endif
            >{{$t}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <label for="order">Order</label>
      </div>
      <div class="col-md-2">
        <select class="form-control" name="order">
          <option value=""></option>
          <option value="before">Before</option>
          <option value="after">After</option>
          <option value="childOf">Child Of</option>
        </select>
      </div>
      <div class="col-md-5">
        <select name="orderPage" id="" class="form-control">
          <option value=""></option>
          @foreach($orderPages->pluck('padded_title', 'id')->toArray() as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea rows="10" class="form-control" name="content">{{ $page->content }}</textarea>
    </div>

    <div class="checkbox">
      <label>
        {!! Form::checkbox('hidden', true) !!}
        Hide page from navigation
        <span class="help-block">Checking this will hide the page from the navigation.  Can only be applied to pages without children.</span>
      </label>
    </div>

    <button type="submit" class="btn btn-primary">Save Page</button>
  </form>

  <script type="text/javascript">
    new SimpleMDE().render();
  </script>
@endsection
