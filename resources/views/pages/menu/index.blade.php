@extends('layouts.app', ['title' => 'Menu'])

@section('content')
  @include('users.partials.header', ['title' => __('Daftar Menu')])
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-12">
        <div class="card shadow">
          <div class="card-body">
            <div class="card-title">
              <div class="row">
                <div class="col-6">
                  Daftar Menu
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-primary btn-sm" href="{{ route('menu.create') }}">
                    <i class="fas fa-plus"></i>
                    <span class="btn-inner--text">tambah</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <div>
                <table id="data-table" class="table align-items-center text-center border-bottom-0">
                  <thead class="thead-light">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Harga</th>
                      <th>Kategori</th>
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
        ajax: "{{ route('menu.index') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {
            data: 'name',
            name: 'name',
            render: function(data) {
              return `
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle align-center">
                    <img class="h-100" src="${arguments[2].photo}" alt=""/>
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">${data}</span>
                  </div>
                </div>
              `
            }
          },
          {data: 'description', name: 'description'},
          {
            data: 'price',
            name: 'price',
            render: function(data) {
              return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
              }).format(data)
            }
          },
          {data: 'type', name: 'type'},
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const detail = `
                <a class="btn btn-warning btn-sm btn-icon" href="{{ route("menu.index") }}/${data}/edit">
                  <span class="btn-inner--icon"><i class="fas fa-edit fa-lg"></i></span>
                  <span class="btn-inner--text">edit</span>
                </a>`
              const destroy = `<form action="{{ route("menu.index") }}/${data}" method="POST" class="d-inline">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger btn-sm btn-icon" type="submit">
                  <span class="btn-inner--icon"><i class="fas fa-trash fa-lg"></i></span>
                  <span class="btn-inner--text">delete</span>
                </button>
              </form>`
              const buttons = `
                <div class="d-inline">
                  ${detail}
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
