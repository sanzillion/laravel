<div class="blog-header">
      <div class="container">

		@if (Auth::guard('admin')->id() == 1)
        	<h1 class="blog-title">Master</h1>
      	@else
        	<h1 class="blog-title">Admin</h1>
      	@endif
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
</div>