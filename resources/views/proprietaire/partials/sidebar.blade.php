<div class="sidebar">
    <ul class="sidebar--items">
        <li>
            <a href="{{ route('proprietaire.dashboard') }}" class="{{ Request::is('proprietaire/dashboard') ? 'active--link' : '  text--dark' }}"  >
                <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                <span class="sidebar--item">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('proprietaire.page2') }}" class="{{ Request::is('proprietaire/page2') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                <span class="sidebar--item">Schedule</span>
            </a>
        </li>
        <li>
            <a href="#" class="{{ Request::is('proprietaire/doctors') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                <span class="sidebar--item" style="white-space: nowrap;">Reliable Doctor</span>
            </a>
        </li>
        <li>
            <a href="#" class="{{ Request::is('proprietaire/patients') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-4"><i class="ri-user-line"></i></span>
                <span class="sidebar--item">Patients</span>
            </a>
        </li>
        <li>
            <a href="#" class="{{ Request::is('proprietaire/activity') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                <span class="sidebar--item">Activity</span>
            </a>
        </li>
        <li>
            <a href="#" class="{{ Request::is('proprietaire/support') ? 'active--link ' : '  text--dark' }}"  >
                <span class="icon icon-6"><i class="ri-customer-service-line"></i></span>
                <span class="sidebar--item">Support</span>
            </a>
        </li>
    </ul>
    
    <ul class="sidebar--bottom-items">
    <li class="notif">
            <a href="#" class="text--dark notif-picon notif-bell"  >
                <span class="icon icon-7"><i class="ri-notification-2-line"></i></span>
                <span class="sidebar--item">Notification</span>
            </a>
        </li>
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
