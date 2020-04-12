@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="container-fluid">
        @if (session('status'))
          <div class="alert {{ session('success') ? 'alert-primary' : 'alert-danger' }} alert-dismissible fade show w-75 mx-auto" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card w-75 mx-auto">
          <div class="card-body">
            <h2 class="text-center">Pilih Menu</h2>
            <div class="row justify-content-between">
              <div class="col-sm-6">
                <ul class="fa-ul">
                  <li>
                    <span class="fa-li">
                      <i class="fas fa-user"></i>
                    </span>
                    {{ ucwords($order->user->name) }}
                  </li>
                  <li>
                    <span class="fa-li">
                      <i class="fas fa-phone"></i>
                    </span>
                    {{ $order->user->phone }}
                  </li>
                  <li>
                    <span class="fa-li">
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    {{ ucwords($order->kecamatan) }}
                  </li>
                </ul>
              </div>
              <div class="col-sm-6 text-right">
                <ul class="list-unstyled">
                  <li>
                    {{ $order->code }}
                    <i class="fas fa-box ml-2"></i>
                  </li>
                  <li>
                    Paket Coba | {{ $order->package->total_items }} Item
                    <i class="fas fa-box ml-2"></i>
                  </li>
                </ul>
              </div>
            </div>

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
                @php($i = 1)
                @foreach ($orders as $key => $item)
                  @php($tanggal = date_format(date_create($item->pivot->antar), "D, d-M-Y"))
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->pivot->total }}</td>
                    <td>
                      {{ $tanggal }}
                    </td>
                    <td>{{ $item->pivot->optional }}</td>
                    <td>
                      @if ($tanggal != date("D, d-M-Y"))
                        <form action="{{route('make-order.destroy', [
                          'code' => $code,
                          'menuId' => $item->id,
                          'antar' => $item->pivot->antar
                        ])}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                          <i class="fas fa-trash"></i>
                        </button>
                        </form>
                      @endif
                    </td>
                  </tr>
                  @php($i++)
                @endforeach

                <!-- START Form -->
                @if ($limit > 0)
                  <form action="{{ route('make-order.add', $code) }}" method="POST">
                    @csrf
                    <tr>
                      <td>{{ $i }}</td>
                      <td>
                        <div class="form-group">
                          <input class="form-control" placeholder="Pilih Menu" type="text" id="menu" name="menu">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input class="form-control" type="text" id="price" value="Rp 0" disabled>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input class="form-control" type="number" name="jumlah" value="1" min="0" {{ $order->package->total_items>0 ? 'disabled' : ''}}>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input class="form-control" type="date" name="antar">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <select id="optional" name="optional" class="form-control">
                            <option value="">-</option>
                            @foreach ($tambahan as $item)
                              <option value="{{ $item }}">
                              {{ ucwords($item) }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </td>
                      <td>
                        <button type="submit" class="btn btn-success">
                          <div class="fas fa-plus"></div>
                          Tambah
                        </button>
                      </td>
                    </tr>
                  </form>
                @endif
                <!-- END Form -->

                <tr>
                  <td colspan="5"></td>
                  <td colspan="2">
                    <form action="{{ route('make-order.purchase', [
                      'code' => $code,
                      'status' => 'canceled'
                    ])}}" method="POST">
                    @method("PUT")
                    @csrf
                      <button type="submit" class="btn btn-outline-warning btn-sm btn-block mb-2">
                        Cancel
                      </button>
                    </form>
                    <form action="{{ route('make-order.purchase', [
                      'code' => $code,
                      'status' => 'confirmed'
                    ]) }}" method="POST">
                    @method("PUT")
                    @csrf
                      <button type="submit" class="btn btn-outline-primary btn-sm btn-block">
                        Lanjut
                      </button>
                    </form>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script charset="utf-8">
    $(document).ready(function() {
      const temp = {!! json_encode($menus) !!}
      $('#menu')
      .autocomplete({
        minLength: 0,
        source: temp,
        focus: function(e, ui) {
          $('#menu').val(ui.item.name)
          $('#price').val(`Rp ${ui.item.price.toLocaleString('id')}`)
          return false
        },
        select: function(e, ui) {
          $('#menu').val(ui.item.name)
          $('#price').val(`Rp ${ui.item.price.toLocaleString('id')}`)
          return false
        }
      })
      .autocomplete('instance')._renderItem = function(ul, item) {
        return $("<li>")
          .append(item.name)
          .appendTo(ul)
      }
    })
  </script>
@endpush
