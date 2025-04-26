<div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @if (!empty($images) && count($images) > 0)
                            @foreach ($images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="w-100 h-100" 
                                        src="{{ asset('storage/public/maisons/' . basename($image)) }}" 
                                        alt="Image de la maison">
                                </div>
                            @endforeach
                        @else
                        
                            <div class="carousel-item active">
                                <img class="w-100 h-100" 
                                    src="{{ asset('img/logo-dashboard.png') }}" 
                                    alt="Image par défaut">
                            </div>
                        @endif
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
                <h3>{{ $maisondet->nom . ' ' . $categorie->nom }}</h3>
                    <h4 class="text-muted">{{ $maisondet->ville . ' ' . $maisondet->adresse }}</h4>
                    <small class="text-muted">
                        Capacité : {{ $maisondet->capacite }} personne{{ $maisondet->capacite > 1 ? 's' : '' }}
                    </small>

                    <div class="d-flex mb-3">
                        <div class="text--primary mr-2">
                            @php
                                $fullStars = floor($averageRating);
                                $halfStar = ($averageRating - $fullStars) >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <small class="fas fa-star"></small>
                            @endfor

                            @if ($halfStar)
                                <small class="fas fa-star-half-alt"></small>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <small class="far fa-star"></small>
                            @endfor
                        </div>
                        <small class="pt-1">({{ $reviewsCount }} avis)</small>
                    </div>

                    <h3 class="font-weight-semi-bold mb-4">{{ $maisondet->prix_par_nuit }} TND/nuit</h3>
                   
                    
                   
                    <div class="d-flex align-items-center mb-4 pt-2">
                    <button class="btn btn-primary px-3"  data-modal-target="modal-reservation{{ $maisondet->id }}"><i class="fas fa-calendar-plus"></i> Reserver</button>
                        
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
            