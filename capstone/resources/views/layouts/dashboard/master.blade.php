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

    @include ('layouts.dashboard.header')

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
          @yield ('content')
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->

	@include ('layouts.footer')

  @yield ('scripts')
  @include ('layouts.scripts')

  </body>
</html>
