<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <a class="logo" href="{{ route('home') }}">
            <div class="block sm:hidden">
              
                SCAW
            </div>
            <div class="hidden sm:block">
                <img src="frontend/1.png" width="100px" alt="">
               
                
            </div>
        </a>
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        @auth
            <ul class="mb-0 list-none buy-button">
                <li class="relative inline-block dropdown ps-1">
                    <button data-dropdown-toggle="dropdown" class="items-center dropdown-toggle" type="button">
                        <span class="text-white rounded-full btn btn-icon bg-emerald-600 hover:bg-emerald-700 border-emerald-600 hover:border-emerald-700">
                            <img src="https://static.vecteezy.com/system/resources/previews/005/129/844/non_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg" class="rounded-full" alt="">
                        </span>
                    </button>
                    <div class="absolute z-10 hidden m-0 mt-4 overflow-hidden bg-white rounded-md shadow dropdown-menu end-0 w-44 dark:bg-slate-900 dark:shadow-gray-700" onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                @if (auth()->user()->role === 'user')
                                    <a href="{{ route('getTraineeProfile', auth()->user()->id) }}" class="flex items-center px-4 py-2 font-medium dark:text-white/70 hover:text-emerald-600 dark:hover:text-white">
                                        <i data-feather="user" class="size-4 me-2"></i>
                                        Profile
                                    </a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 font-medium dark:text-white/70 hover:text-emerald-600 dark:hover:text-white">
                                        <i data-feather="user" class="size-4 me-2"></i>
                                        Dashboard
                                    </a>
                                @endif
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 font-medium dark:text-white/70 hover:text-emerald-600 dark:hover:text-white">
                                    <i data-feather="log-out" class="size-4 me-2"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        @else
            <ul class="mb-0 list-none buy-button">
                <li class="inline-block pe-1">
                    <a href="{{ route('login') }}" class="text-white rounded-full btn bg-emerald-600 hover:bg-emerald-700 border-emerald-600 hover:border-emerald-700">Login</a>
                </li>
                <li class="inline-block">
                    <a href="{{ route('register') }}" class="bg-transparent rounded-full btn hover:bg-emerald-600 border-emerald-600 text-emerald-600 hover:text-white">Register</a>
                </li>
            </ul>
        @endauth

        <div id="navigation">
            <ul class="justify-end navigation-menu">
                <li>
                    <a href="{{ route('home') }}" class="sub-menu-item">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="sub-menu-item">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('getTrades') }}" class="sub-menu-item">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="sub-menu-item">
                        Contacts
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
