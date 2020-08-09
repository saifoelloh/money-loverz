<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ route('landing-page') }}">
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
                            <img src="{{ asset('argon') }}/img/brand/logo-black.png">
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
            @php
              // $alamat = $_SERVER['REQUEST_URI'] != '/' ? '/' : '';
              $alamat = "/"
            @endphp
            <ul class="navbar-nav align-items-lg-center text-center ml-lg-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ $alamat.'#paket' }}">
                  <span class="nav-link-inner--text">{{ __('Paket') }}</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ $alamat."#" }}" class="nav-link" data-toggle="dropdown" role="button">
                  <span class="nav-link-inner--text">{{ __('Katalog') }}</span>
                </a>
                <div class="dropdown-menu">
                  <a href="{{ $alamat.'#katalog'}}" class="dropdown-item">{{ __('Lunch & Dinner') }}</a>
                  <a href="{{ $alamat.'#snack'}}" class="dropdown-item">{{ __('Snack & Beverage') }}</a>
                  <a href="{{ $alamat.'#readytocook'}}" class="dropdown-item">{{ __('Ready To Cook') }}</a>
                  <a href="{{ $alamat.'#event'}}" class="dropdown-item">{{ __('Event') }}</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ $alamat."#footer" }}">
                  <span class="nav-link-inner--text">{{ __('Kontak Kami') }}</span>
                </a>
              </li>
              @if ($_SERVER['REQUEST_URI']=="/")
                <li class="nav-item ml-lg-4 pt-1">
                  <a href="#" class="btn btn-block btn-info btn-icon" data-toggle="modal" data-target="#modal-validation">
                    <span class="btn-inner--icon">
                      <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="nav-link-inner--text">Order Sekarang</span>
                  </a>
                </li>
              @endif
            </ul>
        </div>
    </div>
</nav>
