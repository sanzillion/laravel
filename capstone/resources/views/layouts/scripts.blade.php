    <script>
      $(document).ready(function(){
        // console.log("Animation on going...");
        var x = @php
          if($flash){ echo "'".$flash."'"; }else{ echo "''";}
        @endphp 

        function fadeAway(){
          // console.log("fading!");
          setTimeout(function(){
            $('#flash-message').animate({opacity: '0'});
          }, 1500);
        }

        if(x){
          fadeAway();
        }

      });
    </script>