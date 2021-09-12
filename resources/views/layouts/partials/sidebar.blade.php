<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        {{-- <img class="admin-brand-logo" src="{{ asset('assets/img/logo.png') }}" width="100" alt="{{ config('app.name') }}"> --}}
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <li class="menu-item {{ (Route::currentRouteName() == 'home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                            Tableau de bord
                        </span>
                    </span>

                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-view-dashboard"></i>
                    </span>
                </a>
            </li>
            <li class="menu-item {{ str_starts_with(Route::currentRouteName(), 'salaries.') ? 'active' : '' }}">
                <a href="{{ route('salaries.index') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                            Salaires
                        </span>
                    </span>

                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-office-building"></i>
                    </span>
                </a>
            </li>
             <li class="menu-item {{ str_starts_with(Route::currentRouteName(), 'expenses.') ? 'active' : '' }}">
                <a href="{{ route('expenses.index') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                            Dépenses
                        </span>
                    </span>

                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-store"></i>
                    </span>
                </a>
            </li>
            <li class="menu-item {{ str_starts_with(Route::currentRouteName(), 'incomes.') ? 'active' : '' }}">
                <a href="{{ route('incomes.index') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                            Revenus
                        </span>
                    </span>

                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-account-group"></i>
                    </span>
                </a>
            </li>

            {{-- <li class="menu-item {{ str_starts_with(Route::currentRouteName(), 'rapports.') ? 'active' : '' }}">
                <a href="{{ route('rapports.index') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">
                            Rapports
                        </span>
                    </span>

                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-account-group"></i>
                    </span>
                </a>
            </li> --}}


        </ul>
    </div>
</aside>
