@extends('layouts.app', ['title' => 'Customer'])

@section('content')
@include('users.partials.header', ['title' => __('Daftar Pelanggan')])
<div class="container-fluid mt--7">
    <div class="row">
      <div class="col-12">
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Daftar Pelanggan
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('customer.create') }}">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
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
                                        <th>Gender</th>
                                        <th>Telephone</th>
                                        <th>Alamat</th>
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
        ajax: "{{ route('customer.index') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {
            data: 'gender',
            name: 'name',
            render: data => data == 'male' ? 'Pria' : 'Wanita'
          },
          {data: 'phone', name: 'phone'},
          {data: 'address', name: 'address'},
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const detail = `
                <a class="btn btn-warning btn-sm btn-icon" href="{{ route("customer.index") }}/${data}/edit">
                  <span class="btn-inner--icon"><i class="fas fa-edit fa-lg"></i></span>
                  <span class="btn-inner--text">edit</span>
                </a>`
              const destroy = `<form action="{{ route("customer.index") }}/${data}" method="POST" class="d-inline">
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
