@extends ('layouts.landing.master')

@section ('extrahead')
	<head>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/landing/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/landing/devs.css') }}">
	</head>
@endsection

@section ('content')
<div class="wrapper">
          <div class="p-4 my-4" id="developer">
            <div class="container">
                <!-- SPEAKERS SECTION --> 
  <section id="speakers">
    <h3>THE DEV TEAM</h3> <!-- Section Title -->
    <div class="separator"></div>
    <div class="container">
      <div class="row">
        <!-- Section Description -->
        <div class="col-md-4">
          <img class="img-fluid" src="{{ asset('images/jp.png') }}" alt="">
        </div>
        <div class="col-md-4">
          <div class="intro text-justify padtop">
            <p>A Capstone Project from the Information Technology Students (College of Information and Communications Technology) from St. John Paull II College of Davao</p>
          </div>
        </div>
        <div class="col-md-4">
          <img class="img-fluid" src="{{ asset('images/ict.png') }}" alt="">
        </div>        
      </div>
      
      <!-- First Row of Speakers -->
      <div class="row">
      
        <!-- Speaker 1 -->
        <div class="col-md-3">
          <a  class="member-profile">
            <div class="unhover_img">
            <img src="{{ asset('images/zak1.jpg') }}" alt="" />
            </div>
            <div class="hover_img">
            <img src="{{ asset('images/zak1.jpg') }}" alt="" />
            </div>
            <span>Project Leader</span>
            <h4><span>Zakey </span> Zailon</h4>
          </a>  
          <ul>
            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-foursquare"></i></a></li>           
          </ul>
        </div>
        
        <!-- Speaker 2 -->
        <div class="col-md-3">
          <a class="member-profile">
            <div class="unhover_img">
            <img src="{{ asset('images/sandy.jpg') }}" alt="" />
            </div>
            <div class="hover_img">
            <img src="{{ asset('images/sandy.jpg') }}" alt="" />
            </div>
            <span>Web Developer</span>
            <h4><span>Sandru</span> Valle</h4>
          </a>  
          <ul>
            <li><a href="https:\\sanzillion.github.io" target="_blank"><i class="fa fa-github"></i></a></li>
            <li><a href="https:\\twitter.com\sanzillion" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https:\\sanzillion.wordpress.com" target="_blank"><i class="fa fa-wordpress"></i></a></li>
            <li><a href="https:\\facebook.com\sanzillion"  target="_blank"><i class="fa fa-facebook"></i></a></li>
          </ul>
        </div>
        
        <!-- Speaker 3 -->
        <div class="col-md-3">
          <a class="member-profile">
            <div class="unhover_img">
            <img src="{{ asset('images/wasme.jpg') }}" alt="" />
            </div>
            <div class="hover_img">
            <img src="{{ asset('images/wasme.jpg') }}" alt="" />
            </div>
            <span>Web Designer</span>
            <h4><span>Aljon Mar</span> Omandac</h4>
          </a>          
          <ul>
            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>           
            <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>            
          </ul>         
        </div>
        
        <!-- Speaker 4 -->
        <div class="col-md-3">
          <a class="member-profile">
            <div class="unhover_img">
            <img src="{{ asset('images/eman.jpg') }}" alt="" />
            </div>
            <div class="hover_img">
            <img src="{{ asset('images/eman.jpg') }}" alt="" />
            </div>
            <span>Web Dancer</span>
            <h4><span>Emman</span> Imbod</h4>
          </a>          
          <ul>
            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-foursquare"></i></a></li>
            <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          </ul>           
        </div>
        
      </div> <!-- End First Row -->
            </div>
          </div>
   </div>
        <!-- /.wrapper -->
    </div>
@endsection
