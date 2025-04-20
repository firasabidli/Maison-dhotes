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
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class=" px-xl-5">
           
            <div class=" table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
        <thead class="thead-dark">
            <tr>
                <th>Images</th>
                <th>Maison d'Hôte</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Statut</th>
                <th>Prix Par Nuit</th>
                <th>Total</th>
                <th>Modifier Réservation</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($reservations as $reservation)
                @php
                    $maison = $reservation->maison;
                @endphp
                <tr>
                    <td class="align-middle">
                        @if ($maison->images && count($maison->images) > 0)
                            <div id="carousel-{{ $reservation->id }}" class="carousel slide" data-ride="carousel" style="width: 100px; height: 100px; padding: 10px; margin: 0 auto;">
                                <div class="carousel-inner bg-light">
                                    @foreach ($maison->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img class="w-100 h-100" src="{{ asset('storage/public/maisons/' . basename($image)) }}" alt="Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <span>Aucune image</span>
                        @endif
                    </td>
                <td class="align-middle">{{ $maison->nom }}</td>
                <td class="align-middle">{{ $maison->ville }}</td>
                <td class="align-middle">{{ $maison->adresse }}</td>
                <td class="align-middle">{{ $reservation->date_debut }}</td>
                <td class="align-middle">{{ $reservation->date_fin }}</td>
                <td class="align-middle">{{ $reservation->statut }}</td>
                <td class="align-middle">{{ $maison->prix_par_nuit }} TND</td>
                <td class="align-middle">{{ $totals[$reservation->id] ?? 'N/A' }} TND</td>
                <td class="align-middle">
                    <button href="" class="btn btn-sm btn-warning" data-modal-target="modal-reservation{{ $reservation->id }}">
                        <i class="fa fa-edit"></i> Modifier
                    </button>
                </td>
            </tr>
            @include('client.components.modal.edit-reservation-modal', ['reservation' => $reservation])
        @endforeach
    </tbody>
</table>

            </div>
            
        </div>
    </div>
    <!-- Cart End -->


   
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