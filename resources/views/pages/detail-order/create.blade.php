@extends('layouts.app', ['title' => __('Tambah Pesanan')])

@section('content')
@include('users.partials.header', ['title' => __('Tambah Pesanan')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Tambah Pesanan
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('order.show', $order) }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('detail-order.store', $code) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="menu">Menu</label>
                                    <select name="menu" id="menu" class="form-control" required>
                                        @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">
                                          {{ $menu->name." | ".$menu->price }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="total">Jumlah</label>
                                    <input class="form-control" type="number" name="total" id="total" value="1" {{ $package->total_items == 3 ? 'disabled' : '' }} required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="antar">Tanggal Antar</label>
                                    <input type="date" name="antar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="note">Catatan</label>
                                    <textarea id="note" class="form-control" name="note" required></textarea>
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

