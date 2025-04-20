<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="{{ route('proprietaire.dashboard') }}" class="{{ Request::is('proprietaire/dashboard') ? 'active--link' : '  text--dark' }}"  >
                <span class="icon icon-1"><i class="ri-dashboard-fill"></i></span>
                <span class="sidebar--item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('category.index') }}" class="{{ Request::is('proprietaire/categories') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-2"><i class="ri-home-gear-fill"></i></span>
                <span class="sidebar--item">Catégories</span>
            </a>
        </li>
        <li>
            <a href="{{ route('maisons.index') }}" class="{{ Request::is('proprietaire/maisons') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-3"><i class="ri-home-heart-fill"></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">Maisons d'Hôte</span>
            </a>
        </li>
        <li>
            <a href="{{ route('reservation.reservationsMaisons') }}" class="{{ Request::is('proprietaire/gestion-reservation') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-4"><i class="ri-reserved-fill"></i></span>
                <span class="sidebar--item">Réservation</span>
            </a>
        </li>
        <li>
            <a href="{{ route('avis.index') }}" class="{{ Request::is('proprietaire/avis') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                <span class="sidebar--item">Contrôle Avis</span>
            </a>
        </li>
        
    </ul>
    
    <ul class="sidebar--bottom-items">
    
        <li class="notif">
            <a href="#" class="text--dark notif-picon notif-chat"  >
                <span class="icon icon-7"> <i class="ri-wechat-2-line"></i></span>
                <span class="sidebar--item">Messages</span>
            </a>
        </li>
        <li>
            <a href="#" class="{{ Request::is('proprietaire/settings') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                <span class="sidebar--item">Settings</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class=" text--dark" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                    <span class="sidebar--item">Logout</span>
                </a>
            </form>
            
        </li>
    </ul>
</div>
