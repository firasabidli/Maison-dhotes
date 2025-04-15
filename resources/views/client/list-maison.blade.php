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
    @include('client.components.alert')

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtre par Prix</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('maisonList.maisonList') }}" method="GET">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" name="prix[]" class="custom-control-input" {{ $filtre=='non'? 'checked' : '' }} id="price-all" value="">
                         <label class="custom-control-label" for="price-all">Tous</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('0-50', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-1" value="0-50">
                            <label class="custom-control-label" for="price-1">0DTN - 50DTN</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('50-100', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-2" value="50-100">
                            <label class="custom-control-label" for="price-2">50DTN - 100DTN</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]"{{ is_array(request()->prix) && in_array('100-200', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-3" value="100-200">
                            <label class="custom-control-label" for="price-3">100DTN - 200DTN</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('200-300', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-4" value="200-300">
                            <label class="custom-control-label" for="price-4">200DTN - 300DTN</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('300-400', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-5" value="300-400">
                            <label class="custom-control-label" for="price-5">300DTN - 400DTN</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" name="prix[]" {{ is_array(request()->prix) && in_array('400-500', request()->prix) ? 'checked' : '' }} class="custom-control-input" id="price-6" value="400-500">
                            <label class="custom-control-label" for="price-6">400DTN - 500DTN</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                        <div style="text-align:center; margin-top:20px">
                            <button class="btn btn-primary w-100"  type="submit"> Filtrer </button>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Ville Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtre par Ville</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="{{ route('maisonList.maisonList') }}" method="GET" class="form-scroll" id="maison-filter-form" >
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" value="" class="custom-control-input"  {{ $filtre=='non'? 'checked' : '' }} id="ville-all"   >
                                <label class="custom-control-label" for="ville-all">Tous</label>
                                <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="villes-container">
                            <!-- Colonne 1 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tunis"  {{  in_array('Tunis', request()->input('villes', [])) ? 'checked' : '' }}  value="Tunis">
                                <label class="custom-control-label" for="tunis">Tunis</label>
                                <span class="badge border font-weight-normal">150</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sfax"  {{  in_array('Sfax', request()->input('villes', [])) ? 'checked' : '' }} value="Sfax">
                                <label class="custom-control-label" for="sfax">Sfax</label>
                                <span class="badge border font-weight-normal">120</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sousse"  {{  in_array('Sousse', request()->input('villes', [])) ? 'checked' : '' }} value="Sousse">
                                <label class="custom-control-label" for="sousse">Sousse</label>
                                <span class="badge border font-weight-normal">110</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kairouan"  {{  in_array('Kairouan', request()->input('villes', [])) ? 'checked' : '' }}   value="Kairouan">
                                <label class="custom-control-label" for="kairouan">Kairouan</label>
                                <span class="badge border font-weight-normal">90</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="bizerte"  {{  in_array('Bizerte', request()->input('villes', [])) ? 'checked' : '' }}   value="Bizerte">
                                <label class="custom-control-label" for="bizerte">Bizerte</label>
                                <span class="badge border font-weight-normal">85</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="gabes"  {{  in_array('Gabès', request()->input('villes', [])) ? 'checked' : '' }}  value="Gabès">
                                <label class="custom-control-label" for="gabes">Gabès</label>
                                <span class="badge border font-weight-normal">80</span>
                            </div>
                            
                            <!-- Colonne 2 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="ariana"  {{  in_array('Ariana', request()->input('villes', [])) ? 'checked' : '' }}  value="Ariana">
                                <label class="custom-control-label" for="ariana">Ariana</label>
                                <span class="badge border font-weight-normal">75</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="monastir"  {{  in_array('Monastir', request()->input('villes', [])) ? 'checked' : '' }} value="Monastir">
                                <label class="custom-control-label" for="monastir">Monastir</label>
                                <span class="badge border font-weight-normal">70</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="nabeul"  {{  in_array('Nabeul', request()->input('villes', [])) ? 'checked' : '' }}  value="Nabeul">
                                <label class="custom-control-label" for="nabeul">Nabeul</label>
                                <span class="badge border font-weight-normal">65</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="beja"  {{  in_array('Béja', request()->input('villes', [])) ? 'checked' : '' }}  value="Béja">
                                <label class="custom-control-label" for="beja">Béja</label>
                                <span class="badge border font-weight-normal">60</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="jendouba"  {{  in_array('Jendouba', request()->input('villes', [])) ? 'checked' : '' }}  value="Jendouba">
                                <label class="custom-control-label" for="jendouba">Jendouba</label>
                                <span class="badge border font-weight-normal">55</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kef"  {{  in_array('Le Kef', request()->input('villes', [])) ? 'checked' : '' }}  value="Le Kef">
                                <label class="custom-control-label" for="kef">Le Kef</label>
                                <span class="badge border font-weight-normal">50</span>
                            </div>
                            
                            <!-- Colonne 3 -->
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="mahdia"  {{  in_array('Mahdia', request()->input('villes', [])) ? 'checked' : '' }}  value="Mahdia">
                                <label class="custom-control-label" for="mahdia">Mahdia</label>
                                <span class="badge border font-weight-normal">45</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="medenine"  {{  in_array('Médenine', request()->input('villes', [])) ? 'checked' : '' }}  value="Médenine">
                                <label class="custom-control-label" for="medenine">Médenine</label>
                                <span class="badge border font-weight-normal">40</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tataouine"  {{  in_array('Tataouine', request()->input('villes', [])) ? 'checked' : '' }}  value="Tataouine">
                                <label class="custom-control-label" for="tataouine">Tataouine</label>
                                <span class="badge border font-weight-normal">35</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="tozeur"  {{  in_array('Tozeur', request()->input('villes', [])) ? 'checked' : '' }}  value="Tozeur">
                                <label class="custom-control-label" for="tozeur">Tozeur</label>
                                <span class="badge border font-weight-normal">30</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="kebili"  {{  in_array('Kébili', request()->input('villes', [])) ? 'checked' : '' }}  value="Kébili">
                                <label class="custom-control-label" for="kebili">Kébili</label>
                                <span class="badge border font-weight-normal">25</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="zaghouan"  {{  in_array('Zaghouan', request()->input('villes', [])) ? 'checked' : '' }}  value="Zaghouan">
                                <label class="custom-control-label" for="zaghouan">Zaghouan</label>
                                <span class="badge border font-weight-normal">20</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="benarous"  {{  in_array('Ben Arous', request()->input('villes', [])) ? 'checked' : '' }} value="Ben Arous">
                                <label class="custom-control-label" for="benarous">Ben Arous</label>
                                <span class="badge border font-weight-normal">15</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="manouba"  {{  in_array('La Manouba', request()->input('villes', [])) ? 'checked' : '' }}  value="La Manouba">
                                <label class="custom-control-label" for="manouba">La Manouba</label>
                                <span class="badge border font-weight-normal">10</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="seliana"  {{  in_array('Siliana', request()->input('villes', [])) ? 'checked' : '' }}  value="Siliana">
                                <label class="custom-control-label" for="seliana">Siliana</label>
                                <span class="badge border font-weight-normal">8</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="gafsa"  {{  in_array('Gafsa', request()->input('villes', [])) ? 'checked' : '' }}  value="Gafsa">
                                <label class="custom-control-label" for="gafsa">Gafsa</label>
                                <span class="badge border font-weight-normal">6</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="sidi"  {{  in_array('Sidi Bouzid', request()->input('villes', [])) ? 'checked' : '' }}  value="Sidi Bouzid">
                                <label class="custom-control-label" for="sidi">Sidi Bouzid</label>
                                <span class="badge border font-weight-normal">5</span>
                            </div>
                            
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="villes[]" class="custom-control-input" id="djerba"  {{  in_array('Djerba', request()->input('villes', [])) ? 'checked' : '' }}  value="Djerba">
                                <label class="custom-control-label" for="djerba">Djerba</label>
                                <span class="badge border font-weight-normal">3</span>
                            </div>
                        </div>
                        
                    </form>

                    <div style="text-align:center; margin-top:20px; ">
                            <button class="btn btn-primary w-100"  type="submit" form="maison-filter-form"> Filtrer </button>
                        </div>
                </div>
                <!-- Ville End -->

                
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('maisonList.maisonList', array_merge(request()->all(), ['sort' => 'nom'])) }}">Alphabet A-Z</a>
                                    <a class="dropdown-item" href="{{ route('maisonList.maisonList', array_merge(request()->all(), ['sort' => 'prix'])) }}">Prix</a>
                                    <a class="dropdown-item" href="{{ route('maisonList.maisonList', array_merge(request()->all(), ['sort' => 'ville'])) }}">Ville</a>
                                </div>
                                </div>
                                <div class="btn-group ml-2">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($maisons as $maison)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/public/maisons/' . basename($maison->images[0])) }}" 
                                    alt="Image de la maison"> 
                                    <div class="product-action">
                                    <button class="btn btn-outline-dark btn-square"  data-modal-target="modal-reservation{{ $maison->id }}"><i class="fa fa-shopping-cart"></i></button>
                                        
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('maison.detail', $maison->id) }}"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{ $maison->nom }}</a>
                                    <small class="text-muted">{{ $maison->ville }}</small>
                
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $maison->prix_par_nuit }} TND/nuit</h5>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small class="far fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('client.components.modal.reservation-modal', ['maison' => $maison])
                    @endforeach
                    <div class="col-12">
                        <!-- Pagination Laravel -->
                        {{ $maisons->links() }}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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