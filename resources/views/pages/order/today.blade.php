@extends('layouts.app', ['title' => 'Pesanan Hari Ini'])

@section('content')
  @include('users.partials.header', ['title' => __('Pesanan Hari Ini')])
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-12">
        <div class="card shadow">
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-watch-time"></i></span>
                <span class="alert-text">
                  {{ session('status') }}
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="table-responsive">
              <div>
                <table id="data-table" class="table align-items-center text-center border-bottom-0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Nama Pemesan</th>
                      <th>Paket Pesanan</th>
                      <th>Pembayaran Via</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.footers.auth')
  </div>
@endsection

@push('js')
  <script type="text/javascript">
    $(function () {
      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('order.index') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'customer.name', name: 'customer'},
          {data: 'package.name', name: 'package'},
          {data: 'payment_method', name: 'payment_method'},
          {
            data: 'menus',
            name: 'menus',
            render: function(data) {
              let price = 0
              const package = arguments[2].package
              if (package.price === 0) {
                const prices = data.map(menu => menu.price * menu.pivot.total)
                price = prices.length > 0 ? prices.reduce((acc, cur) => acc + cur) : 0
              } else {
                price = package.price
              }
              return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
              }).format(price)
            }
          },
          {data: 'status', name: 'status'},
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const detail = `
                <a class="btn btn-success btn-sm btn-icon" href="{{ route("order.index") }}/${data}">
                  <i class="fas fa-eye fa-lg"></i>
                  detail
                </a>`
              const edit = `
                <a class="btn btn-warning btn-sm btn-icon" href="{{ route("order.index") }}/${data}/edit">
                  <i class="fas fa-edit fa-lg"></i>
                  edit
                </a>`
              const destroy = `<form action="{{ route("order.index") }}/${data}" method="POST" class="d-inline">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger btn-sm btn-icon" type="submit">
                  <i class="fas fa-trash fa-lg"></i>
                  delete
                </button>
              </form>`
              const buttons = `
                <div class="d-inline">
                  ${detail}
                  ${edit}
                  ${destroy}
                </div>
              `
              return buttons
            }
          }
        ],
        pagingType: "numbers"
      });
    });
  </script>
@endpush

