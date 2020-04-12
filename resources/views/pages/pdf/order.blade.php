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
      <!-- START data transaksi -->
      <table class="w-100 table table-borderless">
        <tr>
          <td>
            <ul class="list-unstyled">
              <li>
                {{ ucwords($order->user->name) }}
              </li>
              <li>
                {{ $order->user->phone }}
              </li>
              <li>
                {{ ucwords($order->kecamatan) }}
              </li>
              <li>
                {{ ucwords($order->payment_method) }}
              </li>
            </ul>
          </td>
          <td class="text-right">
            <ul class="list-unstyled">
              <li>
                {{ $order->code }}
              </li>
              <li>
                Paket Coba | {{ $order->package->total_items }} Item
              </li>
            </ul>
          </td>
        </tr>
      </table>
      <!-- END data transaksi -->

      <!-- START table of order -->
      <div class="float-none">
        <table class="table table-borderless text-center">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Menu</th>
              <th>Tanggal Pengiriman</th>
              <th>Tambahan</th>
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
                <td>{{ $tanggal }}</td>
                <td>{{ $item->pivot->optional }}</td>
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

    </div>
  </body>
</html>
