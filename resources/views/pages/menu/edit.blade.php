@extends('layouts.app', ['title' => __('Adding Menu')])

@section('content')
  @include('users.partials.header', ['title' => __('Edit Menu')])

  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <div class="card-title">
              <div class="row">
                <div class="col-6">
                  Edit Menu
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-icon btn-primary btn-sm" href="{{ route('menu.index') }}">
                    <span class="btn-inner--text">kembali</span>
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                  </a>
                </div>
              </div>
            </div>
            <form action="{{ route('menu.update', $menu->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label" for="name">Nama</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $menu->name }}" placeholder="nama makanan" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="price">Harga</label>
                    <input class="form-control" type="number" name="price" id="price" value="{{ $menu->price }}" placeholder="harga makanan" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="type">Tipe</label>
                    <select class="form-control" name="type">
                      @foreach ($types as $type)
                        <option value="{{$type}}" {{$menu->type==$type?'selected':''}}>
                        {{ucwords($type)}}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="photo">foto</label>
                    <input class="form-control py-auto" type="file" name="photo" id="photo" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="description">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" placeholder="description makanan">{{ $menu->description }}</textarea>
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
      <div class="col-xs-12 col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <div class="card-title">
              Detail Menu
            </div>
            <div class="row align-items-stretch">
              <div class="col-6">
                <img class="w-100" src="{{ $menu->photo }}" alt="" />
              </div>
              <div class="col-6">
                <form action="">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-muted" value="{{ $menu->name }}">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-muted" value="{{ $menu->price }}">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-muted" value="{{ $menu->category }}">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control form-control-muted">{{ $menu->description}}</textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.footers.auth')
  </div>
@endsection
