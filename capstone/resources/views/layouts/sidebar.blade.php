
          <h6><b>SEARCH</b></h6>
          <hr class="style1">
          <form id="searchPostForm" action="/stories" method="GET">
            <div class="input-group">
              <input type="text" class="form-control searchinput" required placeholder="Search Posts..">
              <div class="input-group-btn">
                <button class="btn btn-sanz searchPosts" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          <hr>
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p class="text-justify" style="color:gray"><i>The Save our schools Network</i> is a network of child rights advocates, organizations and various stakeholders working together to bring light and take action on the ongoing violation of children’s right to education, particularly those in the context of militarization and attacks on schools.</p>
          </div>
          <hr>
          <h5><b>RECENT POSTS</b></h5>
          @foreach ($recents as $recent)
            <a href="/posts/{{  $recent->id }}">
                <h3 class="text-sm">{{ substr($recent->title, 0, 15).'... ' }} by {{ $recent->user->name }}</h3>
            </a>
          @endforeach
          <hr class="style2">
          <p class="con-p"></p>
          <div class="sidebar-module">
          <hr>
            <h4>Archives</h4>
            <ol class="list-unstyled">
              @foreach ($archives as $stats)
                <li>
                  <a href="/stories?month={{ $stats['month'] }}&year={{ $stats['year'] }}">{{ $stats['month'] . ' ' . $stats['year'] }}</a>
                </li>
              @endforeach
            </ol>
          </div>

{{--           <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
              @foreach ($tags as $tag)
                <li>
                  <a href="/posts/tags/{{ $tag }}">
                  {{ $tag }}
                  </a>
                </li>
              @endforeach
            </ol>
          </div> --}}

          <div class="sidebar-module">
            <h4>Connect with us:</h4>
            <ol class="list-unstyled ">
              <li><a href="#"><i class="fa fa-twitter "></i> Twitter</a></li>
              <li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
              <li><a href="#"><i class="fa fa-wordpress"></i> Wordpress</a></li>
            </ol>
          </div> 