<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Merlin HTML/CSS template">
    <meta name="author" content="Hasan Alibegic">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Merlin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600" async defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" async defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.2/venobox.css" async defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" async defer> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" async defer>
   
    <link rel="stylesheet" href="{{asset('css/app.css')}}" async defer>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" async defer>

    
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   
<div id="app">
    <div class="loader">
        <div class="loading"></div>
    </div>
    <section id="home" class="page overlay">
        <div class="container">
            <div class="content cover text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="mt-0 mb-4 animated hiding" data-animation="fadeInDown" data-delay="300">We Do Corporate Portrait Photography</h1>
                        <a class="mt-0 mb-4 btn btn-blue nav-external animated hiding" data-animation="fadeIn" data-delay="900" href="#services">Find more</a>
                        <h3 class="mt-0 mb-0 animated hiding" data-animation="fadeIn" data-delay="600">We Have Made A Lot Of People Happy</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="navbar-top">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed">
            <div class="container">
                <a class="navbar-brand nav-external" href="#home">Merlin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#clients">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section id="services" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">Nous réalisons des portraits corporate</h2>
                    <div class="border"></div>
                    <div class="d-flex justify-content-center">
                    <p class="mt-4 mb-0 text-justify">Une image vaut plus que 1000 mots. À notre époque  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem nihil dolores accusantium officiis sit eligendi eaque nostrum inventore fuga, officia quia architecto nesciunt, repudiandae vel praesentium iusto, tenetur nobis repellat.Dolorum dicta quibusdam, veritatis tempore itaque inventore cumque recusandae consequuntur est aspernatur voluptatibus exercitationem repudiandae unde nam voluptate quas tenetur voluptatum debitis molestias! Inventore, deserunt expedita ex culpa perspiciatis et?</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="work" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">This is how we do it.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
                </div>
                <div class="lightbox d-none">
                    
                    <i class="close-box fa fa-times" aria-hidden="true"></i>
                    <div class="lightbox-img">
                        <i class="prev fa-4x fa fa-chevron-left" aria-hidden="true"></i>

                        {{-- <button class="prev">Prev</button> --}}
                        <img src="" alt="" class="lightbox-image">
                        <i class="next fa-4x fa fa-chevron-right" aria-hidden="true"></i>
                        {{-- <button class="next">Next</button> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      
                                <div class=" row items list-unstyled clearfix animated hiding mb-0" data-animation="fadeInRight" >
                                @foreach($photos as $photo)
                                <div class="item branding col-sm-4">
                                    
                                        <img class="portfolio-img" src="{{Storage::disk('photo')->url($photo->image)}}" alt="" value="{{ $loop->index }}">
                                        <div class="overlay">
                                            
                                        </div>
                                   
                                    </div>
                                @endforeach
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="clients">
        <div class="container">
            <div class="content text-center">
                <div class="row">
                    <div class="col-sm-12 animated hiding" data-animation="fadeInDown">
                        <div id="testimonials" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                                <li data-target="#testimonials" data-slide-to="1" class=""></li>
                                <li data-target="#testimonials" data-slide-to="2" class=""></li>
                                <li data-target="#testimonials" data-slide-to="3" class=""></li>
                            </ol>
                            <div class="carousel-inner">
  
                                <div class="carousel-item active flex-column">
                                <p class="quote mb-4">{{$firsttestimonies->testimonies}}</p>
                                <p class="client mb-5">{{$firsttestimonies->author}}</p>
                                </div>
                                @foreach ($slicedtestimonies as $slicedtestimonie)
                                <div class="carousel-item flex-column">
                                <p class="quote mb-4"> {{$slicedtestimonie->testimonies}}</p>
                                <p class="client mb-5">{{$slicedtestimonie->author}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="SessionForm" class="page">
        <div class="container">
            <div>
                <h3 class="text-center mt-5">ceci est un formulaire </h3>
                <p class="m-2 mt-4 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum, architecto. Aliquam eius nemo omnis eaque delectus ut itaque natus eveniet consectetur vel veritatis officia tempore aperiam dolorum debitis, temporibus sit.Pariatur possimus officiis fugit vitae, consequatur voluptates quisquam nostrum, ipsam perspiciatis quo, aperiam voluptatibus cum id quidem sunt sint harum minus delectus? Et quia quisquam rem, autem quam nemo? Rerum.</p>
            </div>

            <div class="boxsection text-center">
                {{-- formulaire en vue JS  --}}
                
                <example-component></example-component>
               
              
            </div>
        </div>
    </section>
    <section id="contact" class="page overlay">
        <div class="container">
            <div class="content cover text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">Getting in touch.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="row">
                    <div class="col-sm-4 animated hiding" data-animation="fadeInRight" data-delay="600">
                        <i class="fa fa-map-marker fa-3x"></i>
                        <a href="#">Mostar, Bosnia and Herzegovina</a>
                    </div>
                    <div class="col-sm-4 animated hiding" data-animation="fadeInDown" data-delay="300">
                        <i class="fa fa-phone fa-3x"></i>
                        <a href="tel:9876543210">(987) 654-3210</a>
                    </div>
                    <div class="col-sm-4 animated hiding" data-animation="fadeInLeft" data-delay="600">
                        <i class="fa fa-envelope fa-3x"></i>
                        <a href="mailto:john.doe@mail.com">john.doe@mail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animated hiding" data-animation="fadeInUp">
                    <ul class="social list-inline">
                        <li class="list-inline-item">
                            <a class="facebook" href="http://www.facebook.com" title="Facebook">
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="twitter" href="http://www.twitter.com" title="Twitter">
                                <i class="fa fa-twitter fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="google-plus" href="http://www.plus.google.com" title="Google+">
                                <i class="fa fa-google-plus fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="dribbble" href="http://www.linkedin.com" title="Dribbble">
                                <i class="fa fa-dribbble fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.4/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.3/imagesloaded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-one-page-nav/3.0.0/jquery.nav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.3.3/jquery.appear.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.2/venobox.min.js"></script>
    <script src="{{asset('js/script.js?v=1.0')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    {{-- <script src="{{asset('js/test.js')}}"></script> --}}
  
    <!-- Google Analytics: change UA-25089888-9 to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-25089888-9');ga('send','pageview');
    </script>
 

</body>
</html>
