@extends('layouts.app', ['title' => __('Adding Order')])

@section('content')
@include('users.partials.header', ['title' => __('Buat Pesanan')])

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
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('order.index') }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('order.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="customer">Nama Pelanggan</label>
                                    <select name="customer" id="customer" class="form-control" required>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">
                                            {{ $customer->name." | ".$customer->phone }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="package">Pilih Paket</label>
                                    <select name="package" id="package" class="form-control" required>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}">
                                            {{ $package->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment_method">Opsi Pembayaran</label>
                                    <select name="payment_method" id="payment_method" class="form-control" required>
                                        <option value="transfer">Transfer</option>
                                        <option value="cash on delivery">
                                            Cash on Delivery
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control" required>
                                        <option value="pedurungan">Pedurungan</option>
                                        <option value="tlogosari">Tlogosari</option>
                                        <option value="kimar">Kimar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kelurahan">Kelurahan</label>
                                    <select name="kelurahan" id="kelurahan" class="form-control" required>
                                        <option value="pedurungan">Pedurungan</option>
                                        <option value="tlogosari">Tlogosari</option>
                                        <option value="kimar">Kimar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="jalan">Jalan</label>
                                    <input type="text" name="jalan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="address_notes">Catatan Alamat</label>
                                    <textarea class="form-control" name="address_notes" id="address_note">
                                    </textarea>
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