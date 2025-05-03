<div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('img/carousel-1.png') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Maisons d’Hôtes en Tunisie</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Explorez une sélection unique de maisons d’hôtes authentiques partout en Tunisie. Réservez dès maintenant pour une expérience inoubliable.
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('maisonList.maisonList') }}">Voir les maisons</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('img/carousel-2.png') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Séjours de Charme</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Profitez d’un séjour de charme dans nos hébergements soigneusement sélectionnés. Confort, authenticité et hospitalité tunisienne.
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('maisonList.maisonList') }}">Réserver maintenant</a>
                                    </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('img/carousel-3.png') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Vacances en Toute Sérénité</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                        Réservez votre maison d’hôte idéale pour des vacances paisibles entre amis ou en famille, au bord de la mer ou en pleine nature.
                                    </p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('maisonList.maisonList') }}">Commencer</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('img/image1.png') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Maisons d’Hôtes</h6>
                        <h3 class="text-white mb-3">Réservez en Tunisie</h3>
                        <a href="{{ route('maisonList.maisonList') }}" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp">Explorer</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('img/image2.png') }}" alt="">
                    <div class="offer-text">
                    <h6 class="text-white text-uppercase">Séjour Authentique</h6>
                    <h3 class="text-white mb-3">Maisons d’hôtes en Tunisie</h3>
                    <a href="{{ route('maisonList.maisonList') }}" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp">Voir plus</a>

                    </div>
                </div>
            </div>
        </div>
    </div>