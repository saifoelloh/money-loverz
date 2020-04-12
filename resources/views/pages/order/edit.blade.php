@extends('layouts.app', ['title' => __('Edit Order')])

@section('content')
@include('users.partials.header', ['title' => __('Edit Order')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Edit Order
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('order.index') }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('order.update', $order->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="customer">Nama Pelanggan</label>
                                    <select name="customer" id="customer" class="form-control" disabled required>
                                      <option value="{{ $order->customer->id }}">
                                          {{ $order->customer->name }}
                                      </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="package">Pilih Paket</label>
                                    <select name="package" id="package" class="form-control" {{ $statusPemesanan ? '' : 'disabled' }} required>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ $order->package->id == $package->id ? 'selected' : '' }}>
                                            {{ $package->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="payment_method">Opsi Pembayaran</label>
                                    <select name="payment_method" id="payment_method" class="form-control" {{ $statusPemesanan ? '' : 'disabled'}} required>
                                        @foreach ($payments as $payment)
                                          <option value="{{ $payment }}" {{ $order->payment_method == $payment ? 'selected' : '' }}>
                                            {{ ucwords($payment) }}
                                          </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        @foreach ($status as $stat)
                                          <option value="{{ $stat }}" {{ $order->status == $stat ? 'selected' : '' }}>
                                              {{ ucwords($stat) }}
                                          </option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kecamatan">Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control" required>
                                        @foreach ($kecamatans as $kecamatan)
                                          <option value="{{ $kecamatan }}" {{ $order->kecamatan === $kecamatan ? 'selected' : '' }}>
                                              {{ ucwords($kecamatan) }}
                                          </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" name="alamat" value="{{ $order->alamat }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="address_notes">Catatan Alamat</label>
                                    <textarea class="form-control" name="address_notes" id="address_note">{{ $order->address_notes }}</textarea>
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

