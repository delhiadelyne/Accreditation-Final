<header class="border-b border-gray-200 header dark:border-gray-700">
    <div class="h-16 header-wrapper">
        <!-- Header Nav Start start-->
        <div class="header-action header-action-start">
            <div id="side-nav-toggle" class="side-nav-toggle header-action-item header-action-item-hoverable">
                <div class="text-2xl">
                    <svg class="side-nav-toggle-icon-expand" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                    <svg class="hidden side-nav-toggle-icon-collapsed" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="header-action header-action-end">
            <!-- User Dropdown-->
            <div class="dropdown">
                <div class="dropdown-toggle" id="user-dropdown" data-bs-toggle="dropdown">
                    <div class="flex items-center gap-2 header-action-item">
                        <span class="avatar avatar-circle" data-avatar-size="32" style="width: 32px">
                        <img class="avatar-img avatar-circle" src="https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg" loading="lazy" alt=""></span>
                        <div class="hidden md:block">
                            <div class="text-xs capitalize">{{ Auth::user()->role }}</div>
                            <div class="font-bold">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                </div>
                <ul class="dropdown-menu bottom-end min-w-[240px]">
                    <li class="menu-item menu-item-hoverable mb-1 h-[35px]">
                        <a class="flex items-center gap-2" href="{{ route('getProfile', auth()->user()->id) }}">
                            <span class="text-xl opacity-50">
                                <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li id="menu-item-29-2VewETdxAb" class="menu-item-divider"></li>
                    <li class="menu-item menu-item-hoverable gap-2 h-[35px]">
                        <a class="flex items-center gap-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="text-xl opacity-50">
                                <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </span>
                            <span>Sign Out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
