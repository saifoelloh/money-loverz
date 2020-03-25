<div class="card shadow">
    <div class="card-body">
        <div class="card-title">
            <div class="row">
                <div class="col-6">
                    Daftar Pesanan
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-icon btn-success btn-sm" href="{{ route('optional-menu.create', $menu_id) }}">
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
                            <th scope="col" class="sort" data-sort="name">No</th>
                            <th scope="col" class="sort" data-sort="budget">Nama</th>
                            <th scope="col" class="sort" data-sort="budget">Kategori</th>
                            <th scope="col" class="sort" data-sort="status">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($options as $id => $item)
                        <tr class="text-center">
                            <th> {{ $id + 1 }} </th>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->category }} </td>
                            <td> {{"Rp. ".number_format($item->price, 0)}} </td>
                            <td>
                                <a class="btn btn-icon btn-warning btn-sm" href="{{ route('optional-menu.edit', $item->id) }}">
                                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    <span class="btn-inner--text">edit</span>
                                </a>
                                <form action="{{ route('optional-menu.destroy', $item->id) }}" method="post" class="my-0 d-inline">
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

