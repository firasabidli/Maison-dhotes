<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
</head>

<body>
   


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                   <img src="{{ asset('img/logo2.png') }}" width="100" height="100" alt="">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('maisonList.maisonList') }}" class="nav-item nav-link">Mison d'Hôtes</a>
                            <a href="#" class="nav-item nav-link">Réservation</a>
                            
                            <a href="#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class=" text-left">
                        <form id="searchForm" ">
                        <div style="position: relative;">
                            <div class="input-group">
                            <input type="text" id="searchInput" class="form-control" name="nom" placeholder="Rechercher une maison" onclick="showSuggestions()" readonly>
                            <input type="hidden" name="maison_id" id="maisonId">
                            <div class="input-group-append">
                                <button  class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                                <ul id="suggestionList" class="list-group mt-2 shadow" style="display: none; position: absolute; width: 100%; max-height: 200px; overflow-y: auto; z-index: 999;">
                                    @foreach ($noms as $maison)
                                        <li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;">
                                            <span class="suggestion-text" data-id="{{ $maison->id }}">{{ $maison->nom }}</span>
                                            <span class="text-danger ml-2" onclick="removeSuggestion(this)">✖</span>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                        </form>

                        </div>
                        <div class="navbar-nav ml-auto py-0  d-lg-block">
                            <div class="btn-group px-0  profile ">
                              <span class="nav-link profil-name"> {{ Auth::user()->name }}</span>  <img src="{{ Auth::user()->avatar ? asset('storage/public/avatars/' . basename(Auth::user()->avatar)) : asset('img/noprofil.jpg') }}"  alt="mdo"  class="rounded-circle  dropdown-toggle" data-toggle="dropdown">
                               <div class="dropdown-menu dropdown-menu-right">
                                   <li><a class="dropdown-item" href="#">Profile</a></li>
                                   <li><hr class="dropdown-divider"></li>
                                   <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="dropdown-item" href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>
                                        </form>
                                    </li>
                                  
                               </div>
                           </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
 

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner bg-light">
        @foreach ($images as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="w-100 h-100" 
                     src="{{ asset('storage/public/maisons/' . basename($image)) }}" 
                     alt="Image de la maison">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
        <i class="fa fa-2x fa-angle-left text-dark"></i>
    </a>
    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
        <i class="fa fa-2x fa-angle-right text-dark"></i>
    </a>
</div>

            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                <h3>{{ $maison->nom . ' ' . $categorie->nom }}</h3>
                    <h4 class="text-muted">{{ $maison->ville . ' ' . $maison->adresse }}</h4>
                    <small class="text-muted">
                        Capacité : {{ $maison->capacite }} personne{{ $maison->capacite > 1 ? 's' : '' }}
                    </small>

                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $maison->prix_par_nuit }} TND/nuit</h3>
                   
                    
                   
                    <div class="d-flex align-items-center mb-4 pt-2">
                        
                        <a href="" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Reserver</a>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Maison Description</h4>
                            <p>{{ $maison->description }}</p>
                          
                        </div>
                        
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    

      <!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary  pt-5">
    <div class="row px-xl-5 ">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Nous Contacter</h5>
            <p class="mb-4">Profitez d'un séjour inoubliable dans nos maisons d'hôtes. Découvrez des lieux uniques et un service de qualité.</p>
            
        </div>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-7 ">
                    <div class="contact-form bg-dark ">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="8" id="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ">
                    
                    <div class="bg-dark p-30 ">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4145978.663705896!2d9.180013128989484!3d33.88691702148562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3365e9b4b9b9%3A0x9c2b30d5f2e6e2b9!2sTunisie!5e0!3m2!1sfr!2stn!4v1603794290143!5m2!1sfr!2stn" 
                            width="100%" height="350" aria-hidden="false" tabindex="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                    <div class="bg-dark p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Rue, Tunis, Tunisie</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>maison.d'hôtes@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+216 12 345 678</p>
                    </div>
                </div>
            </div>
        </div>
       
   
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">maison.d'hôtes@gmail.com</a> 
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{ asset('img/payments.png') }}" alt="Paiements">
        </div>
    </div>
    </div>
</div>
<!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

   

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>