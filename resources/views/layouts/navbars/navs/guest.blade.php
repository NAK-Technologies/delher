<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand text-muted " style="letter-spacing: 0.4em; font-size: 1.5em" href="#">DELHER</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-primary">
                        <i class="tim-icons icon-minimal-left"></i> {{ _('Back to Dashboard') }}
                    </a>
                </li> --}}
                @if(Route::has('register'))
                <li class="nav-item ">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="tim-icons icon-laptop"></i> {{ _('Register') }}
                    </a>
                </li>
                @endif
                <li class="nav-item ">
                    <a href="{{ route('login') }}" class="nav-link text-light">
                        <i class="tim-icons icon-single-02 text-light"></i> {{ _('Login') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
