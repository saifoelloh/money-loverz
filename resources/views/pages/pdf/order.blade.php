<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="">

      <table class="w-100 table-borderless">
        <tr>
          <td>
            <span class="h5">
              Invoice {{ $order->code }}
            </span><br>
            <small>
              Tanggal Pesanan: {{ date_format(date_create($order->created_at), "l, d F Y") }}
            </small>
          </td>
          <td>
            <img src="http://localhost:8000/argon/img/brand/logo-black.png" alt=""/>
          </td>
        </tr>
      </table>

      <hr>

      <!-- START data transaksi -->
      <table class="w-100 table table-borderless">
        <tr>
          <td>
            <p class="font-weight-bold">
              Informasi Pemesanan
            </p>
            <table class="table table-borderless">
              <tr>
                <td>
                  Jenis Pesanan<br>
                  Paket<br>
                  Status<br>
                  Pembayaran
                </td>
                <td>
                  : Reguler (Lunch)<br>
                  : Paket Coba (3 Item)<br>
                  : Confirmed<br>
                  : Transfer
                </td>
              </tr>
            </table>
          </td>
          <td>
            <p class="font-weight-bold">
              Informasi Pelanggan
            </p>
            <table class="table table-borderless">
              <tr>
                <td>
                  Nama<br>
                  Email<br>
                  No Telp
                </td>
                <td>
                  : Bang Gofur<br>
                  : gofur@mail.co<br>
                  : 0840174
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <!-- END data transaksi -->

      <!-- START table of order -->
      <div class="float-none">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Menu</th>
              <th>Tambahan</th>
              <th>Tanggal Pengiriman</th>
              <th>Jumlah</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            @php
              $total = 0;
            @endphp
            @foreach ($order->menus as $key => $item)
              @php
                $tambahan = 0;
                if ($item->pivot->optional!='') {
                  $tambahan = 1000;
                }
                $total += ($item->pivot->total * $item->price + $tambahan);
                $tanggal = date_format(date_create($item->pivot->antar), "D, d-M-Y")
              @endphp
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pivot->optional }}</td>
                <td>{{ $tanggal }}</td>
                <td>{{ $item->pivot->total }}</td>
                <td>{{ "Rp ".number_format($item->price) }}</td>
              </tr>
            @endforeach
            <tr>
              <th class="text-left" colspan="5">Total</th>
              <td>
                {{ "Rp ".number_format($total) }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- END table of order -->

      <table class="w-100 table-borderless">
        <tr>
          <td>
            <span class="font-weight-bold">
              Alamat Pengiriman
            </span><br>
            <small>
              jl. Bayumanik , 123123, 123113 semarang.
            </small>
          </td>
          <td class="text-right">
            <span class="font-weight-bold">
              Dikonfirmasi Oleh
            </span><br>
            <small>
              Satu Pintu ({{ date_format(date_create($order->updated_at), "d/m/y, H:i") }})
            </small>
          </td>
        </tr>
      </table>

    </div>
  </body>
</html>
