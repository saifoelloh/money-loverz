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
                      <select name="customer" id="customer" class="form-control" disabled required>
                        <option value="{{$customer->id}}">
                          {{ $customer->name." | ".$customer->phone }}
                        </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="package">Pilih Paket</label>
                      <select name="package" id="package" class="form-control" disabled required>
                        <option value="{{ $package->id }}">
                        {{ $package->name }}
                        </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="payment_method">Opsi Pembayaran</label>
                      <select name="payment_method" id="payment_method" class="form-control" {{ $order->status == "terbayar" ? 'disabled' : ''}} disabled required>
                          <option value="transfer" {{ $order->payment_method == "transfer" ? 'selected' : '' }}>
                              Transfer
                          </option>
                          <option value="cash on delivery" {{ $order->payment_method == "cash on delivery" ? 'selected' : '' }}>
                              Cash on Delivery
                          </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="kecamatan">Kecamatan</label>
                      <select name="kecamatan" id="kecamatan" class="form-control" disabled required>
                          <option {{ $order->kecamatan == 'pedurungan' ? 'selected' : '' }} value="pedurungan">Pedurungan</option>
                          <option {{ $order->kecamatan == 'tlogosari' ? 'selected' : '' }} value="tlogosari">Tlogosari</option>
                          <option {{ $order->kecamatan == 'kimar' ? 'selected' : '' }} value="kimar">Kimar</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="kelurahan">Kelurahan</label>
                      <select name="kelurahan" id="kelurahan" class="form-control" disabled required>
                          <option {{ $order->kelurahan == 'pedurungan' ? 'selected' : '' }} value="pedurungan">Pedurungan</option>
                          <option {{ $order->kelurahan == 'tlogosari' ? 'selected' : '' }} value="tlogosari">Tlogosari</option>
                          <option {{ $order->kelurahan == 'kimar' ? 'selected' : '' }} value="kimar">Kimar</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="jalan">Jalan</label>
                      <input type="text" name="jalan" class="form-control" value="{{ $order->jalan }}" disabled required>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="address_notes">Catatan Alamat</label>
                      <textarea class="form-control" name="address_notes" id="address_note" disabled required>{{ $order->address_notes }}</textarea>
                    </div>
                  </form>
                    <a class="btn btn-icon btn-primary btn-block" href="{{ route('menu.index') }}">
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
            @include('pages.detail-order.index', [ 'options' => $items, 'order_code' => $order->code ])
        </div><!-- END of Optionals List -->
    </div>
    @include('layouts.footers.auth')
</div>
@endsection

