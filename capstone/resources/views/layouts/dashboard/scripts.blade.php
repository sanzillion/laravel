    <!-- Javascript files-->
    
    <script src="{{ asset('js/dashboard/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/tether.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('js/dashboard/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/front.js') }}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
        var session = @php
          echo "'".session('page')."'";
        @endphp

        //the code below is for retaining the side-navigation 
        //bar through multiple page loads
        
        var menu = @php
            echo "'".session('menu')."'";
        @endphp;
        // console.log(menu);

        $(document).ready(function(){

              $('#toggle-btn').on("click", function(){

                if(menu != ''){
                    $.ajax({
                       url:"/session/"+menu,
                       method:"GET",
                       success:function(data){
                        console.log(data);
                       }
                    });
                }

              });

              if(menu == 'inactive'){
                  $('.brand-big').css('display', 'none');
                  $('.brand-small').css('display', 'block');
                  $('#toggle-btn').removeClass("active");
                  $('.side-navbar').addClass("shrinked");
                  $('.content-inner').addClass("active");
              }
        });
    </script>