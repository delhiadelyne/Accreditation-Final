<div class="side-nav side-nav-transparent side-nav-expand">
    <div class="side-nav-header">
        <div class="px-6 py-24">
            <h2 class="text-center text-dark" style="font-size: 28px; padding-top: 10px; color: #065F46;">SCAW</h2>
        </div>
    </div>
    <div class="relative side-nav-content side-nav-scroll">
        <nav class="px-4 pb-4 menu menu-transparent">
            <div class="menu-group">
                <ul style="padding-top: 50px">
                    @if(auth()->user()->role === 'admin')
                        <li data-menu-item="dashboard" class="mb-2 menu-item menu-item-single">
                            <a class="menu-item-link" href="{{ route('dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12.204c0-2.289 0-3.433.52-4.381c.518-.949 1.467-1.537 3.364-2.715l2-1.241C9.889 2.622 10.892 2 12 2s2.11.622 4.116 1.867l2 1.241c1.897 1.178 2.846 1.766 3.365 2.715S22 9.915 22 12.203v1.522c0 3.9 0 5.851-1.172 7.063S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.212S2 17.626 2 13.725z"/><path stroke-linecap="round" d="M12 15v3"/></g></svg>
                                <span class="menu-item-text">Dashboard</span>
                            </a>
                        </li>
                        <li data-menu-item="#" class="mb-2 menu-item menu-item-single">
                            <a class="menu-item-link" href="{{ route('trainingRequests') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M22 12.5c0-.491-.005-1.483-.016-1.976c-.065-3.065-.098-4.598-1.229-5.733c-1.131-1.136-2.705-1.175-5.854-1.254a115 115 0 0 0-5.802 0c-3.149.079-4.723.118-5.854 1.254c-1.131 1.135-1.164 2.668-1.23 5.733a69 69 0 0 0 0 2.952c.066 3.065.099 4.598 1.23 5.733c1.131 1.136 2.705 1.175 5.854 1.254q1.204.03 2.401.036"/><path d="m2 6l6.913 3.925c2.526 1.433 3.648 1.433 6.174 0L22 6m0 11.5h-8m8 0c0-.7-1.994-2.008-2.5-2.5m2.5 2.5c0 .7-1.994 2.009-2.5 2.5"/></g></svg>
                                <span class="menu-item-text">Program Requests</span>
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->role === 'institution')
                        <li data-menu-item="dashboard" class="mb-2 menu-item menu-item-single">
                            <a class="menu-item-link" href="{{ route('dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12.204c0-2.289 0-3.433.52-4.381c.518-.949 1.467-1.537 3.364-2.715l2-1.241C9.889 2.622 10.892 2 12 2s2.11.622 4.116 1.867l2 1.241c1.897 1.178 2.846 1.766 3.365 2.715S22 9.915 22 12.203v1.522c0 3.9 0 5.851-1.172 7.063S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.212S2 17.626 2 13.725z"/><path stroke-linecap="round" d="M12 15v3"/></g></svg>
                                <span class="menu-item-text">Dashboard</span>
                            </a>
                        </li>
                        <li data-menu-item="#" class="mb-2 menu-item menu-item-single">
                            <a class="menu-item-link" href="{{ route('getTrainingPrograms') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 20 20"><path fill="currentColor" d="M4.5 5.75a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0M6.75 2.5a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5M10 10a2 2 0 0 1 2 1.944l-1.416 1.415a3 3 0 0 0 .41-1.198q.005-.057.005-.083l.001-.017V12a1 1 0 0 0-1-1H3.5a1 1 0 0 0-1 1v.078l.007.083a2.95 2.95 0 0 0 .498 1.336C3.492 14.201 4.513 15 6.75 15c1.56 0 2.529-.389 3.137-.863c-.209.31-.363.653-.454 1.018l-.106.425c-.682.26-1.529.42-2.577.42c-2.513 0-3.867-.92-4.568-1.934a3.95 3.95 0 0 1-.67-1.807a3 3 0 0 1-.012-.175V12a2 2 0 0 1 2-2zm7-3.5a2.499 2.499 0 1 1-5 0a2.5 2.5 0 0 1 5 0m-4 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 0 0-3 0m2.81 3.048l-4.83 4.83a2.2 2.2 0 0 0-.578 1.02l-.375 1.498a.89.89 0 0 0 1.079 1.078l1.498-.374a2.2 2.2 0 0 0 1.02-.578l4.83-4.83a1.87 1.87 0 0 0-2.645-2.644"/></svg>
                                <span class="menu-item-text">Training Progarms</span>
                            </a>
                        </li>
                        <li data-menu-item="#" class="mb-2 menu-item menu-item-single">
                            <a class="menu-item-link" href="{{ route('getApplications') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M22 12.5c0-.491-.005-1.483-.016-1.976c-.065-3.065-.098-4.598-1.229-5.733c-1.131-1.136-2.705-1.175-5.854-1.254a115 115 0 0 0-5.802 0c-3.149.079-4.723.118-5.854 1.254c-1.131 1.135-1.164 2.668-1.23 5.733a69 69 0 0 0 0 2.952c.066 3.065.099 4.598 1.23 5.733c1.131 1.136 2.705 1.175 5.854 1.254q1.204.03 2.401.036"/><path d="m2 6l6.913 3.925c2.526 1.433 3.648 1.433 6.174 0L22 6m0 11.5h-8m8 0c0-.7-1.994-2.008-2.5-2.5m2.5 2.5c0 .7-1.994 2.009-2.5 2.5"/></g></svg>
                                <span class="menu-item-text">Applications</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
