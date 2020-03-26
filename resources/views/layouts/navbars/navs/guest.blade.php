<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav align-items-lg-left ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#paket">
                        <span class="nav-link-inner--text">{{ __('Paket') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#katalog">
                        <span class="nav-link-inner--text">{{ __('Katalog Menu') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer">
                        <span class="nav-link-inner--text">{{ __('Kontak Kami') }}</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block ml-lg-4 pt-1">
                    <a href="#" class="btn btn-info btn-icon" data-toggle="modal" data-target="#modal-form">
                    <span class="btn-inner--icon">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="nav-link-inner--text">Buat Pesanan</span>
                    </a>
                </li>
                </ul>
        </div>
    </div>
</nav>