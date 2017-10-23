    <script>
    var session;
      $(document).ready(function(){
        // button pointer problem
        $('.btn').css("cursor", "pointer");
        // console.log("Animation on going...");
        var x = @php
          if(isset($flash)){ echo "'".$flash."'"; }else{ echo "''";}
        @endphp 

        var error = @php
          if(count($errors)){ echo "'".count($errors)."'"; }else{ echo "''";}
        @endphp

        function fadeAway(){
          // console.log("fading!");
          setTimeout(function(){
            $('#flash-message').animate({opacity: '0'});
          }, 1500);
        }

        if(x || error){
          fadeAway();
        }

      });
    </script>