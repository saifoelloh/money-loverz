@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="container">
        <div class="card mx-auto">
          <div class="card-body">
            <h2 class="text-center">Pilih Menu</h2>
            <div class="row">

              <!-- User and Order -->
              <div class="col">
                <div class="container">
                  <div class="form-group row my-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-secondary">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control bg-secondary" value="Budi Setiawan" readonly>
                    </div>
                  </div>
                  <div class="form-group row my-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-secondary">
                          <i class="fas fa-map-marker-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control bg-secondary" value="Tejokusumo II no 35" readonly>
                    </div>
                  </div>
                  <div class="form-group row my-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-secondary">
                          <i class="fas fa-box"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control bg-secondary" value="Paket Coba" readonly>
                    </div>
                  </div>
                </div>
                @for ($i = 1; $i < 3; $i++)
                  <div class="card shadow-sm mb-3">
                    <div class="card-header py-1">
                      <div class="row justify-content-between">
                        <div class="col">
                          Pesanan - {{ "0$i" }}
                        </div>
                        <div class="col text-right">
                          2020-04-02
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row justify-content-between align-items-center">
                        <div class="col">
                          <div class="media align-items-center">
                            <span class="avatar align-center">
                              <img class="h-100" src="http://localhost:8000/argon/img/dumpmenu2.jpg" alt=""/>
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                              <span class="mb-0 text-sm  font-weight-bold">
                                Cumi Saus Tiram<br>
                                <span class="font-weight-light">
                                  Rp. 20.000
                                </span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col text-right">
                          <div class="btn btn-icon btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endfor
              </div>
              <!-- END user and order -->

              <!-- new order -->
              <div class="col">
                <form action="" method="POST" accept-charset="utf-8">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-bars"></i>
                        </span>
                      </div>
                      <input class="form-control" placeholder="Pilih Menu" type="text" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input class="form-control" placeholder="John Smith" type="date" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-clone"></i></span>
                      </div>
                      <select id="" name="" class="form-control">
                        <option value="">Nasi Merah</option>
                        <option value="">Nasi Kuning</option>
                        <option value="">Kentang Rebus</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group text-right">
                    <button class="btn btn-success btn-icon">
                      <span class="btn-inner--icon">
                        <i class="fa fa-plus"></i>
                      </span>
                      <span class="nav-link-inner--text">Lanjut</span>
                    </button>
                  </div>
                </form>
              </div>
              <!-- END new order -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
