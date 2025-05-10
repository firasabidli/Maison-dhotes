<section class="header">
    <div class="logo">
        <i class="ri-menu-line icon icon-0 menu"></i>
    <span> <img src="{{ asset('img/logo-dashboard.png') }}" class="logoApp" alt="">
    </span>   
    </div>
    <div class="search--notification--profile">
        <div class="search">
            <input type="text" >
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
                <div  class="profile-btn">
                    
                    <img src="{{ Auth::user()->avatar ? asset('storage/public/avatars/' . basename(Auth::user()->avatar)) : asset('img/noprofil.jpg') }}" alt="Profile">
                    <span>{{ Auth::user()->name }}</span>
                </div>
                
            </div>
        </div>
    </div>
</section>
