@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-dark py-7 py-lg-8">
  <div class="page-header">
    <div class="container">
      <div class="card w-75 mx-auto">
        <div class="card-body">
          <h2 class="text-center">Pilih Menu</h2>
          <div class="card shadow-sm">
            <div class="card-header py-1">
              <div class="row justify-content-between">
                <div class="col">
                  Pesanan - 01
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
                      <img class="h-100" src="/argon/img/dumpmenu2.jpg" alt="" />
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
                  <div class="btn btn-icon btn-sm btn-outline-primary">
                    <i class="fas fa-check"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form action="" method="POST" accept-charset="utf-8" class="mt-5">
            <div class="form-group">
              <label for="name" class="form-label">Menu</label>
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-bars"></i>
                  </span>
                </div>
                <input class="form-control" placeholder="John Smith" type="text" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="form-label">Tanggal Kirim</label>
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input class="form-control" placeholder="John Smith" type="date" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="form-label">Optional</label>
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
              <button class="btn btn-warning btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-plus"></i>
                </span>
                <span class="nav-link-inner--text">Lanjut</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection