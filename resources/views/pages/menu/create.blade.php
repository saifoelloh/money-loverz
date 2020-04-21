@extends('layouts.app', ['title' => __('Adding Menu')])

@section('content')
@include('users.partials.header', ['title' => __('Tambah Menu')])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xs-12 col-md-5">
      <div class="card shadow">
        <div class="card-body">
          <div class="card-title">
            <div class="row">
              <div class="col-6">
                Tambah Menu
              </div>
              <div class="col-6 text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('menu.index') }}">
                  <span class="btn-inner--text">kembali</span>
                  <i class="fas fa-reply"></i>
                </a>
              </div>
            </div>
          </div>
          <form action="{{ route('menu.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-label" for="name">Nama</label>
                  <input class="form-control" type="text" name="name" id="name" placeholder="nama makanan" required />
                </div>
                <div class="form-group">
                  <label class="form-label" for="price">Harga</label>
                  <input class="form-control" type="number" name="price" id="price" placeholder="harga makanan" required />
                </div>
                <div class="form-group">
                  <label class="form-label" for="type">Tipe</label>
                  <select class="form-control" name="type">
                    @foreach ($types as $type)
                      <option value="{{$type}}">
                      {{ucwords($type)}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label" for="photo">foto</label>
                  <input class="form-control" type="file" name="photo" id="photo" required />
                </div>
                <div class="form-group">
                  <label class="form-label" for="description">Deskripsi</label>
                  <textarea class="form-control" name="description" id="description" placeholder="description makanan" required></textarea>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <a class="btn btn-warning" href="{{route('menu.index')}}">
                      <i class="fas fa-times"></i>
                      <span class="btn-inner--text">cancel</span>
                    </a>
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
