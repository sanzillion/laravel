
<!DOCTYPE html>
<html lang="en">

  @include ('layouts.head')

  <body>

	@include ('layouts.nav')

    @if ($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
      </div>
    @endif

    @include ('layouts.header')

    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
          @yield ('content')
        </div>

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          @include ('layouts.sidebar')
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->

	@include ('layouts.footer')

  @yield ('scripts')
  @include ('layouts.scripts')

  </body>
</html>
