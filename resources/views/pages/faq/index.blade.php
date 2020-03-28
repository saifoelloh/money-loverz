@extends('layouts.app', ['title' => 'FAQ'])

@section('content')
@include('users.partials.header', ['title' => __('Daftar FAQ')])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Daftar FAQ
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('faq.create') }}">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text">tambah</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <table id="data-table" class="table align-items-center">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th scope="col" class="sort" data-sort="name">No</th>
                                        <th scope="col" class="sort" data-sort="budget">Pertanyaan</th>
                                        <th scope="col" class="sort" data-sort="budget">Jawaban</th>
                                        <th scope="col" class="sort" data-sort="budget">Dibuat Oleh</th>
                                        <th scope="col">Actions</th>
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
        ajax: "{{ route('faq.index') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'question', name: 'question'},
          {data: 'answer', name: 'answer'},
          {
            data: 'question',
            name: 'question',
            render: function(data) {
              console.log({ foo: arguments })
              return `
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle align-center">
                    <i class="fas fa-user"></i>
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">${arguments[2].user.name}</span>
                  </div>
                </div>
              `
            }
          },
          {
            data: 'id',
            name: 'id',
            searchable: false,
            sortable: false,
            render: function(data) {
              const detail = `
                <a class="btn btn-warning btn-sm btn-icon" href="{{ route("faq.index") }}/${data}/edit">
                  <span class="btn-inner--icon"><i class="fas fa-edit fa-lg"></i></span>
                  <span class="btn-inner--text">edit</span>
                </a>`
              const destroy = `<form action="{{ route("faq.index") }}/${data}" method="POST" class="d-inline">
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
