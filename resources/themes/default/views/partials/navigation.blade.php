@foreach($pages as $page)
  <li class="{{Request::is($page->present()->uriWildcard) ? 'active' : ''}} {{count($page->children) ? ($page->parent_id !== null ? 'dropdown-submenu' : 'dropdown') : ''}}">
    <a href="{{url($page->uri)}}">
      {{$page->title}}
      @if(count($page->children))
        <span class="caret {{$page->parent_id !== null ? 'right' : ''}}"></span>
      @endif
    </a>

    @if(count($page->children))
      <ul class="dropdown-menu">
        @include('partials.navigation', ['pages' => $page->children])
      </ul>
    @endif
  </li>

@endforeach
