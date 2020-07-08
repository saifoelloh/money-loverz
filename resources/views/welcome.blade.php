@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <!--
    <div class="header bg-gradient-dark py-7 py-lg-8">
        <div class="page-header">
            <div class="container shape-container d-flex align-items-center">
            <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1 class="text-white display-1">Tidak perlu ribet cari makan siang!</h1>
                    <h2 class="display-4 font-weight-normal text-white">Pilih menu sendiri, biar kami yang <br>antar sampai mejamu.</h2>
                    <div class="btn-wrapper mt-4">
                    <a href="#katalog" class="btn btn-outline-white mt-3 mb-sm-0">
                        Lihat Sekarang
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    -->
    @if (session('status'))
      <div class="alert {{ session('success') ? 'alert-primary' : 'alert-danger' }} alert-dismissible fade show w-75 mx-auto" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('argon') }}/img/sliders/1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('argon') }}/img/sliders/2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('argon') }}/img/sliders/3.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('argon') }}/img/sliders/4.png" alt="Third slide">
            </div>
        </div>

    </div>
      
      
    
    <div id="paket" class="section features-1">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <h3 class="display-3">Paket sesukamu</h3>
            <p class="lead pb-4">Sesuaikan pilihan makan siangmu dengan paket-paket menarik kami, lebih hemat lebih nikmat makannya.</p>
          </div>
        </div>
        <div class="row">
          @foreach ($packages as $index => $package)
            <div class="col-md-4" data-toggle="modal" data-toggle="modal" data-target="#modal-validation">
              <div class="card border-secondary mb-3" style="min-height: 20em;">
                <div class="card-header bg-info text-white">Paket {{ucwords($package->title)}}</div>
                <div class="card-body">
                  <h5 class="card-title">
                    {{ "Rp ".number_format($package->price, 0) }}
                  </h5>
                  <p class="card-text">
                    {{ $package->description }}
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">
                    {{ $package->total_items."x" }} Makan Siang (4 minggu).
                  </small>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    
    <div id="katalog" class="section features-1">
      <div class="container">
        @foreach ($menus as $key => $submenus)
          <div class="row">
            <div class="col-md-8 mx-auto text-center">
              <h3 class="display-3">{{ ucwords($key) }}</h3>
              <p class="lead pb-4"></p>
            </div>
          </div>
          <div class="row">
            @foreach ($submenus as $submenu)
              <div class="col-md-4">
                <div class="card mb-4" style="min-height: 20em;">
                  <img class="card-img-top" src="{{ $submenu->photo }}" alt="Menu satu pintu">
                  <div class="card-body">
                    <h5 class="card-title mb-1">{{ ucwords($submenu->name) }}</h5>
                    <div class="card-info">
                      <span class="badge badge-primary">Rp. {{ number_format($submenu->price) }}</span>
                    </div>
                    <p class="card-text mt-2">
                      {{ $submenu->description }}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach

      </div>
    </div>

    <!-- Modal -->
    @include('layouts.modals.validation')
    @include('layouts.modals.checkorder')
    @include('layouts.modals.createorder')

@endsection
