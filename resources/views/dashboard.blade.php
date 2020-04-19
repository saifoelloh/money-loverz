@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Order Terkonfirmasi</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary">
                                  Halaman Order
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($orderTerkonfirmasi as $key => $order)
                            @php
                              $total = 0;
                              foreach ($order['menus'] as $item) {
                                $subTotal = ($item['price'] * $item['pivot']['total']);
                                $subTotal += $item['pivot']['tambahan'] != "" ? 1000 : 0;
                                $total +=  $subTotal;
                              }
                            @endphp
                            <tr class="text-capitalize">
                              <td>{{ $key+1 }}</td>
                              <td>{{ $order->customer->name }}</td>
                              <td>{{ $order->package->name }}</td>
                              <td>{{ $order->payment_method }}</td>
                              <td>{{ "Rp ".number_format($total, 0) }}</td>
                              <td>{{ $order->status }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $orderTerkonfirmasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
