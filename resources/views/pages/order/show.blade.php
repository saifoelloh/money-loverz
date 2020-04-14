@extends('layouts.app', ['title' => __('Detail Order')])
@section('content')
@include('users.partials.header', ['title' => __('Detail Order')])

<div class="container-fluid mt--7">
    <div class="row">
        <!-- Detail Order -->
        <div class="col-xs-12 col-md-4">
            <div class="card shadow">
                <div class="card-body">
                  <form action="">
                    <div class="form-group">
                      <label class="form-label" for="customer">Nama Pelanggan</label>
                      <input class="form-control" type="text" value="{{ $customer->name }}" disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="package">Pilih Paket</label>
                      <select name="package" id="package" class="form-control" disabled required>
                        <option>{{ $package->name }}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="payment_method">Opsi Pembayaran</label>
                      <select name="payment_method" id="payment_method" class="form-control" disabled required>
                        <option>{{ ucwords($order->payment_method) }}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="kecamatan">Kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control" disabled required>
                        <option>{{ ucwords($order->kecamatan) }}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="alamat">Alamt</label>
                      <textarea id="alamat" class="form-control" name="alamat" disabled>{{ $order->alamat }}</textarea>
                    </div>
                  </form>
                    <a class="btn btn-icon btn-primary btn-block" href="{{ route('order.index') }}">
                        <span class="btn-inner--text">kembali</span>
                        <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    </a>
                </div>
            </div>
        </div><!-- END of Detail -->
        <!-- List of Optional Menus -->
        <div class="col-xs-12 col-md-8">
            @if (session('status'))
              <div class="alert {{ session('success') ? 'alert-primary' : 'alert-danger' }} alert-dismissible fade show" role="alert">
                <strong>{{ session('success') ? 'Selamat' : 'Error' }}</strong> {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @include('pages.detail-order.index', [ 'options' => $items, 'order_code' => $order->code, 'totalItems' => $package->total_items ])
        </div><!-- END of Optionals List -->
    </div>
    @include('layouts.footers.auth')
</div>
@endsection

