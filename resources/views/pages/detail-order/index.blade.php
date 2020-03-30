<div class="card shadow">
    <div class="card-body">
        <div class="card-title">
            <div class="row">
                <div class="col-6">
                    Daftar Pesanan
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-icon btn-success btn-sm" href="{{ route('detail-order.create', $order_code) }}">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                        <span class="btn-inner--text">tambah</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Pengiriman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($options as $id => $item)
                        <tr class="text-center">
                            <th> {{ $id + 1 }} </th>
                            <td> {{ $item->name }} </td>
                            <td> {{"Rp. ".number_format($item->price, 0)}} </td>
                            <td> {{ $item->pivot->total }} </td>
                            <td> {{ date("D, d-m-Y", strtotime($item->pivot->antar)) }} </td>
                            <td> {{ $item->pivot->status }} </td>
                            <td>
                                <a class="btn btn-icon btn-warning btn-sm" href="{{ route('detail-order.edit', ['code' => $order_code, 'menu' => $item->id]) }}">
                                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    <span class="btn-inner--text">edit</span>
                                </a>
                                <form action="{{ route('detail-order.destroy', ['code' => $order_code, 'menu' => $item->id])}}" method="post" class="my-0 d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-icon btn-danger btn-sm" type="submit">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        <span class="btn-inner--text">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

