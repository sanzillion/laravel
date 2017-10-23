@extends ('layouts.landing.master')


@section ('content')
<div class="bg bg-stories"></div>
<div class="wrapper">
  <div class="p-4 my-4" id="about">
    <div class="container">
      <div class="row">

        {{-- side posts --}}
        <div class="col-md-8">
            @if($posts->count() < 1)
                <div class="blog-post card">
                    <div class="card-header title">
                        No posts yet.
                    </div>
                    <div class="card-body">
                        Nothing to show.
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            @endif
            @foreach($posts as $post) 

                <div class="blog-post card margin-v">
                    <div class="card-header title">
                        <a href="/posts/{{  $post->id }}">
                            <h3 class="blog-post-title">{{ $post->title }}</h3>
                        </a>
                        <i class="blog-post-meta">
                        <i class="blurr"><i class="fa fa-calendar"></i> {{ $post->created_at->toFormattedDateString()  }} 
                        by &nbsp </i> {{ $post->user->name }}</i>
                    </div>
                    
                    <div class="card-body text-justify">
                        <p>{!! $post->body !!}</p>
                    </div>
                    <div class="card-footer comfoot">
                        @if($post->comments->count() > 0)
                            <i class="blurr">{{ $post->comments->count() }} comment/s</i>
                        @else
                            <i class="blurr">No comments yet</i>
                        @endif
                    </div>
                </div><!-- /.blog-post -->

            @endforeach

            @if(method_exists($posts, 'render'))
                {{ $posts->render() }}
            @endif
        </div>
        {{-- sidebar --}}
        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
