@extends('layouts.app', ['title' => __('User Management')])

@section('content')
  @include('users.partials.header', ['title' => __('Daftar Admin')])
  <div class="container-fluid mt--7">
      <div class="row">
          <div class="col">
              <div class="card shadow">
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">{{ __('Users') }}</h3>
                          </div>
                          <div class="col-4 text-right">
                              <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                          </div>
                      </div>
                  </div>
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
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="data-table" class="table align-items-center table-flush border-bottom-0 text-center">
                              <thead class="thead-light">
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>No Telepon</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody></tbody>
                          </table>
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
        ajax: "{{ route('user.index') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {data: 'phone', name: 'phone'},
          {data: 'email', name: 'email'},
          {data: 'role', name: 'role'},
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const detail = `
                <a class="btn btn-warning btn-sm btn-icon" href="{{ route("user.index") }}/${data}/edit">
                  <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                  <span class="btn-inner--text">edit</span>
                </a>`
              const destroy = `<form action="{{ route("user.index") }}/${data}" method="POST" class="d-inline">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger btn-sm btn-icon" type="submit">
                  <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
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
