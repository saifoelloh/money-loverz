<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Paket</th>
      <th>Metode Pembayaran</th>
      <th>Harga</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $key => $order)
      @php
        $total = 0;
        foreach ($order['menus'] as $item) {
          $subTotal = ($item['price'] * $item['pivot']['total']);
          $subTotal += $item['pivot']['tambahan'] != "" ? 1000 : 0;
          $total +=  $subTotal;
        }
      @endphp
      <tr class="text-capitalize">
        <td>{{ $key+1 }}</td>
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->package->name }}</td>
        <td>{{ $order->payment_method }}</td>
        <td>{{ "Rp ".number_format($total, 0) }}</td>
        <td>{{ $order->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
