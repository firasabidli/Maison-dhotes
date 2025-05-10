<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active--link' : '  text--dark' }}"  >
                <span class="icon icon-1"><i class="ri-dashboard-fill"></i></span>
                <span class="sidebar--item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categoryIndex') }}" class="{{ Request::is('admin/categories') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-2"><i class="ri-home-gear-fill"></i></span>
                <span class="sidebar--item">Catégories</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.maisonsIndex') }}" class="{{ Request::is('admin/maisons') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-3"><i class="ri-home-heart-fill"></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">Maisons d'Hôte</span>
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.avisIndex') }}" class="{{ Request::is('admin/avis') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                <span class="sidebar--item">Contrôle Avis</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.usersIndex') }}" class="{{ Request::is('admin/gestion-utilisateurs') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-3"><i class="ri-group-2-fill"></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">Gestion Utilisateurs</span>
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
            <a href="{{ route('profil.settings') }}" class="{{ Request::is('/profil') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                <span class="sidebar--item">Paramaitre</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class=" text--dark" href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                    <span class="sidebar--item">Déconnexion</span>
                </a>
            </form>
            
        </li>
    </ul>
</div>
