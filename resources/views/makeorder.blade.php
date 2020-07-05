@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="card mx-auto">
        <div class="card-body">
          <h2 class="text-center">Pilih Menu</h2>
          <table class="table table-borderless table-hover text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Tanggal Pengiriman</th>
                <th>Tambahan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @for ($i=1;$i<5;$i++)
                <tr>
                  <td>{{ $i }}</td>
                  <td>Nasi Mangkuk</td>
                  <td>Rp 20.000</td>
                  <td>1</td>
                  <td>Senin, 20/04/2020</td>
                  <td>-</td>
                  <td>
                    <form action="{{route('make-order.destroy', $i)}}">
                      <button class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endfor
              <!-- START Form -->
              <form action="{{ route('make-order.add', $i) }}" method="POST">
                @csrf
                <tr>
                  <td>{{ $i }}</td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" placeholder="Pilih Menu" type="text" name="menu">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" type="text" disabled>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" type="number" name="jumlah" min="0" {{ $i%2 ? 'disabled' : ''}}>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" type="date" name="pengiriman">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <select id="option" name="option">
                        <option value="">-</option>
                        @foreach ($tambahan as $item)
                          <option value="{{ $item }}">
                          {{ ucwords($item) }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </td>
                </tr>
              </form>
              <!-- END Form -->

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
