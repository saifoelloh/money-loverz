@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="container">
        <div class="card mx-auto">
          <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table-invoice" width="100%">
                        <tr>
                            <th width="20%">No Telp.</th>
                            <td width="10">:</td>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success btn-icon" data-toggle="modal" data-target="#modal-form">
                        <span class="btn-inner--icon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="nav-link-inner--text">Buat Pesanan Baru</span>
                    </button>
                </div>
            </div>

            <h4 class="text-center pt-3">Riwayat Order</h4>
            <hr>
            <table class="table table-borderless table-hover text-center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No Order</th>
                  <th>Tanggal Order</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $id => $order)
                  @php
                    $tanggal = date_format(date_create($order->created_at), "d F Y");
                  @endphp
                  <tr>
                    <td>{{ $id+1 }}</td>
                    <td>{{ $order->code }}</td>
                    <td>{{ $tanggal }}</td>
                    <td>
                      <span class="badge badge-primary">
                        {{ $order->status }}
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('make-order.index', $order->code )}}" class="btn btn-sm btn-warning">
                        Detail 
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->

@include('layouts.modals.checkorder') 
@include('layouts.modals.createorder')

@endsection
