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
                            <a href="{{ route('client.home') }}" 
                            class="nav-item nav-link {{ request()->routeIs('client.home') ? 'active' : '' }}">
                            Acceuil
                            </a>

                            <a href="{{ route('maisonList.maisonList') }}" 
                            class="nav-item nav-link {{ request()->routeIs('maisonList.maisonList') ? 'active' : '' }}">
                            Maison d'Hôtes
                            </a>

                            <a href="{{ route('reservation.suivieDemande') }}" 
                            class="nav-item nav-link {{ request()->routeIs('reservation.suivieDemande') ? 'active' : '' }}">
                            Réservation
                            </a>
                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('admin.dashboard') }}" 
                                class="nav-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                   Dashboard
                                </a>
                            @endif

                            @if (Auth::user()->role == 'propriétaire')
                                <a href="{{ route('proprietaire.dashboard') }}" 
                                class="nav-item nav-link {{ request()->routeIs('proprietaire.dashboard') ? 'active' : '' }}">
                                   Dashboard
                                </a>
                            @endif

                            <a href="#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class=" text-left">
                        <form id="searchForm" ">
                        <div style="position: relative;">
                            <div class="input-group">
                            <input type="text" id="searchInput" class="form-control" name="nom" placeholder="Rechercher une maison" onclick="showSuggestions()" readonly>
                            <input type="hidden" name="maison_id" id="maisonId">
                            <div class="input-group-append">
                                <button  class="input-group-text bg-transparent text--primary">
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
                              <span class="nav-link profil-name {{ request()->routeIs('profil.settings') ? 'text--primary' : '' }}dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }}</span>  <img src="{{ Auth::user()->avatar ? asset('storage/public/avatars/' . basename(Auth::user()->avatar)) : asset('img/noprofil.jpg') }}"  alt="mdo"  class="rounded-circle  dropdown-toggle" data-toggle="dropdown">
                               <div class="dropdown-menu dropdown-menu-right">
                                   <li><a class="dropdown-item" href="{{ route('profil.settings') }}">Paramaitre</a></li>
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