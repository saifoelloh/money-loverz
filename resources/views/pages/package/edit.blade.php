@extends('layouts.app', ['title' => __('Edit Paket')])

@section('content')
@include('users.partials.header', ['title' => __('Edit Paket')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Edit Paket
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('package.index') }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('package.update', $package->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nama</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $package->name }}" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="total_items">Total Item</label>
                                    <input class="form-control" type="number" name="total_items" id="total_items" value="{{ $package->total_items }}" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="price">Harga</label>
                                    <input class="form-control" type="number" name="price" id="price" value="{{ $package->price }}" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="photo">Foto</label>
                                    <input class="form-control" type="file" name="photo" id="photo" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description" required>{{ $package->description }}</textarea>
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