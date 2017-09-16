@extends ('layouts.master')

@section ('content')

	   <div class="col-sm-8 blog-main">
          @foreach ($posts as $post)
            @include('posts.article')
            {{-- expr --}}
          @endforeach

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

@endsection