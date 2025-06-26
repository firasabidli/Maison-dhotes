<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Maisons d'hôtes Les plus demandée</span>
    </h2>
    <div class="row px-xl-5">
    @foreach ($maisons as $maison)
    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <div class="product-item bg-light mb-4">
            

            <div class="product-img position-relative overflow-hidden">
                <img class="img-fluid w-100" style="height: 200px; object-fit: cover;" 
     src="{{ isset($maison->images[0]) ? asset('storage/public/maisons/' . basename($maison->images[0])) : asset('img/logo-dashboard.png') }}" 
     alt="Image de la maison">

            </div>
            <div class="product-action">
            <a class="btn btn-outline-dark btn-square"  data-modal-target="modal-client-info-{{ $maison->user->id }}"><i class="ri-user-search-fill"></i></a>
             @auth   
            <a class="btn btn-outline-dark btn-square"  data-modal-target="modal-reservation{{ $maison->id }}"><i class="fas fa-calendar-plus"></i></a>
            @else 
            <a class="btn btn-outline-dark btn-square" href="{{ route('login') }}"><i class="ri-login-box-fill"></i></a>
            @endauth
            <a class="btn btn-outline-dark btn-square" href="{{ route('maison.detail', $maison->id) }}"><i class="fa fa-search"></i></a>
            </div>
            <div class="text-center py-4">
                <a class="h6 text-decoration-none text-truncate" href="">{{ $maison->nom }}</a>
                <small class="text-muted">{{ $maison->ville }}</small>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5>{{ $maison->prix_par_nuit }} TND/nuit</h5>
                </div>
                <div class="d-flex mb-3">
                        <div class="text--primary mr-2">
                           
                        </div>
                        <small class="pt-1"></small>
                    </div>
                <div class="d-flex align-items-center justify-content-center mb-1">
                            @php
                            $averageRating = $maison->avis->avg('note') ?? 0;
                            $reviewsCount = $maison->avis->count();
                                $fullStars = floor($averageRating);
                                $halfStar = ($averageRating - $fullStars) >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <small class="fas fa-star text--primary"></small>
                            @endfor

                            @if ($halfStar)
                                <small class="fas fa-star-half-alt text--primary"></small>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <small class="far fa-star "></small>
                            @endfor
                    <small>({{ $reviewsCount }} avis)</small>
                    
                </div>
                <small><i class="ri-bar-chart-fill card--icon stat--icon"></i>{{$maison->nb_demande}}</small>
            </div>
        </div>
    </div>
    @include('client.components.modal.reservation-modal', ['maison' => $maison])
    @include('client.components.modal.info-proprietaire-modal', ['user' => $maison->user])
    @endforeach
</div>

   <!-- Pagination Laravel -->
   {{ $maisons->links() }}
</div>