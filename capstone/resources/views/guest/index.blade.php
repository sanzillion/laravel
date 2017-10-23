@extends ('layouts.landing.master')

@section ('content')

    <!-- Image Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid w-100" src=" {{ asset('images/img/pic1.png') }} " alt="">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src=" {{ asset('images/img/pic2.png') }} " alt="">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid w-100" src=" {{ asset('images/img/pic3.png') }} " alt="">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  <div class="wrapper">
     
      <div class="bg-faded p-4 my-4" id="mission">
        <div class="hr-sect">
            <h2 class="text-center text-lg text-uppercase my-0 text-danger">
            <b>Latest Tweet</b>
            </h2>
        </div>
        <p class="qt-mission">"Education is the most powerful weapon which you can use to change the world." - Nelson Mandela</p>
      </div>

      <div class="p-4 my-4" id="portfolio">
          <h4>
          <center></center>
          </h4><br>
        <div class="row">

          <div class="col-md-3 col-sm-3 featured-block-rounded">
            <a href="#"><figure>
            <img src="{{ asset('images/img/1.jpg') }}" class="img-fluid" alt="">
            </figure></a> <h5></h5>
            <div class="featured-block-equal-cont"><p></p></div>
          </div>
          <div class="col-md-3 col-sm-3 featured-block-rounded">
            <a href="#"><figure>
            <img src="{{ asset('images/img/circle2.png') }}" alt="" class="img-fluid">
            </figure></a> <h5></h5>
            <div class="featured-block-equal-cont"><p></p></div>
          </div>
          <div class="col-md-3 col-sm-3 featured-block-rounded">
            <a href="#"><figure>
            <img src="{{ asset('images/img/circle3.png') }}" alt="" class="img-fluid">
            </figure></a> <h5></h5>
            <div class="featured-block-equal-cont"><p></p></div>
          </div>
          <div class="col-md-3 col-sm-3 featured-block-rounded">
            <a href="#"><figure>
            <img src="{{ asset('images/img/circle4.png') }}" class="img-fluid" alt="">
            </figure></a> <h5></h5>
            <div class="featured-block-equal-cont"><p></p></div>
          </div>
        </div>
      </div>

      <div class="bg-faded p-4 my-4" id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="update-1">
                <h5><b>SOS NEWS</b></h5>
                <hr class="style2">
                <div class="news-title">
                <h4>SOS TO PUBLIC: INTENSIFYING STATE FASCISM NEEDS INTENSIFYING COLLECTIVE ACTION</h4>
                </div>
                <img src="{{ asset('images/sossos.png') }}" class="img-fluid img1">
                <p class="con-p">The Save Our Schools (SOS) network called for stronger public vigilance and collective action amidst blatant undermining of human rights in the country.</p>
                <p class="con-p">“The SOS network upholds and protects human rights as it pursues lumad children’s right to education and self-determination and active campaigning against intensifying AFP attacks on lumad schools and communities but the Duterte government’s responses are more bombings, killings, massive displacement due to fascist state policies and plunder of resources,” said Relita Malundras, SOS network national spokesperson.</p>
                <p class="con-p">SOS network cited the recent PhP 1,000.00 budget given to the Commission on Human Rights (CHR) as a deliberate move to undermine human rights. “While we condemn the commission’s inutility on lumad killings, attacks on schools and communities, the budget cut symbolizes arrogant display of power by Duterte lapdogs in the lower house in their clear attempt to hide state perpetrated violations,” Malundras explained.</p>
                <p class="con-p">The group called on the public to unite and fight state fascism. “Needless to say, we cannot hope for justice to be given by a government ruled by a fascist president. Our hope relies on our unity and collective action. Intensified rights violations require massive and intensified actions,” Malundras continued.</p>
                <p class="con-p">SOS network mentioned that concerted efforts and support of rights advocates gave birth to their own network which will launch its first National conference on Saturday, 16th of September, 1:00 PM-5:30 PM at Benitez Hall, University of the Philippines Diliman. “We need to speak and act for thousands of victims, of children and young people murdered by the Duterte government like Obello Bay-ao, a Manobo recently killed by CAFGU and AFP-backed Alamara, and other members of national minority groups who are here in Metro Manila for the Lakbayan ng Pambansang Minorya 2017,” concluded Malundras.</p>
              </div>
            
            </div>
            <div class="col-md-4">

              @include('layouts.sidebar')

            </div>
          </div>
          
        </div>
      </div>

  </div>
    <!-- /.container -->

@endsection