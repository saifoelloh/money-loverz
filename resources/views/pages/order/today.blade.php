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
                      <th>Kode Pemesanan</th>
                      <th>Nama Pemesan</th>
                      <th>No Whatsapp</th>
                      <th>Lokasi Pemesan</th>
                      <th>Paket Pesanan</th>
                      <th>Pesanan</th>
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
        ajax: "{{ route('order.today') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'code', name: 'code'},
          {data: 'customer', name: 'customer'},
          {data: 'phone', name: 'phone'},
          {data: 'kecamatan', name: 'kecamatan'},
          {data: 'package', name: 'package'},
          {data: 'menu', name: 'menu'},
          {data: 'status', name: 'status'},
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const cetak = `
              <a class="btn btn-success btn-sm btn-icon" target="__blank" href="/pdf/order/${arguments[2].order.code}">
                <i class="fas fa-print fa-lg"></i>
                cetak
              </a>`
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
                  ${cetak}
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

