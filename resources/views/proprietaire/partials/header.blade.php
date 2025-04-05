<section class="header">
    <div class="logo">
        <i class="ri-menu-line icon icon-0 menu"></i>
        <h2>Med<span>Ex</span></h2>
    </div>
    <div class="search--notification--profile">
        <div class="search">
            <input type="text" placeholder="Search Schedule..">
            <button><i class="ri-search-2-line"></i></button>
        </div>
        <div class="notification--profile">
            
            <div class="picon bell">
                <i class="ri-notification-2-line"></i>
            </div>
            <div class="picon chat">
                <i class="ri-wechat-2-line"></i>
            </div>

            <!-- Ajout du dropdown -->
            <div class="profile-dropdown " >
                <button id="profile-btn" class="profile-btn">
                    
                    <img src="{{ asset('img/noprofil.jpg') }}" alt="Profile">
                    <span>John Doe ▼</span>
                </button>
                <ul id="profile-menu" class="profile-menu">
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Paramètres</a></li>
                    <li><a href="#">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
