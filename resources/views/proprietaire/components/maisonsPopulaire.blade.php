<div class="doctors">
                <div class="title">
                    <h2 class="section--title">Maison Populaire</h2>
                    
                </div>
             
                <div class="doctors--cards">
                    @foreach ($maisonsPopulaire as $maison)
                        <a href="#" class="doctor--card">
                            <div class="img--box--cover">
                                <div class="img--box">
                                    {{-- Si tu as une image dynamique, remplace le path ci-dessous --}}
                                    <img src="{{ isset($maison->images[0]) ? asset('storage/public/maisons/' . basename($maison->images[0])) : asset('img/logo-dashboard.png') }}" alt="Image Maison">

                                </div>
                            </div>
                            <p class="scheduled">{{ $maison->nom }}</p>
                            <p class="free">{{ $maison->ville }}</p>
                            <p class="free">{{ $maison->adresse }}</p>
                            <p class="free">{{ $maison->prix_par_nuit }} TND / nuit</p>
                            <p class="free">Capacité : {{ $maison->capacite }} personnes</p>
                            <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>{{ $maison->nb_demande }}</span>
                        </div>
                        </a>
                    @endforeach
                </div>

            </div>