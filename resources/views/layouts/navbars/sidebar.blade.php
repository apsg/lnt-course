<div class="sidebar bg-green" data-color="darkgreen">
    <div class="logo">
        @include('layouts.logo')
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            {{ __('Kursy') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravelExamples">
                    <i class="fas fa-cogs"></i>
                    <p>
                        Ustawienia
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="@if ($activePage == 'profile') active @endif">
                            <a href="{{ route('profile.edit') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>Twój profil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="@if ($activePage == 'courses') active @endif">
                <a href="{{ route('course.index') }}">
                    <i class="fas fa-leaf"></i>
                    <p>Kursy</p>
                </a>
            </li>
        </ul>
    </div>
</div>
