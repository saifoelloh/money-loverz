@extends('layouts.app', ['title' => __('Tambah Admin')])

@section('content')
  @include('users.partials.header', ['title' => __('Tambah Admin')])

  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xs-12 col-md-5">
        <div class="card shadow">
          <div class="card-body">
            <div class="card-title">
              <div class="row">
                <div class="col-6">
                  Tambah Admin
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-icon btn-primary btn-sm" href="{{ route('user.index') }}">
                    <span class="btn-inner--text">kembali</span>
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                  </a>
                </div>
              </div>
            </div>
            <form action="{{ route('user.store') }}" method="post" accept-charset="utf-8">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label" for="name">Nama</label>
                    <input class="form-control" type="text" name="name" id="name" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="phone">No Telepon</label>
                    <input class="form-control" type="text" name="phone" id="phone" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="male">Laki-laki</option>
                      <option value="female">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="role">Posisi</label>
                    <select name="role" id="role" class="form-control">
                      <option value="admin">admin</option>
                      <option value="owner">owner</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="address">Alamat</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button class="btn btn-icon btn-warning" type="cancel">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text">cancel</span>
                      </button>
                      <button class="btn btn-icon btn-success" type="submit">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                        <span class="btn-inner--text">submit</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.footers.auth')
  </div>
@endsection

