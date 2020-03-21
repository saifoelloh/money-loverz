@extends('layouts.app', ['title' => 'Paket'])

@section('content')
@include('users.partials.header', ['title' => __('Daftar Paket')])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Daftar Paket
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('package.create') }}">
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
                                        <th scope="col" class="sort" data-sort="id">No</th>
                                        <th scope="col" class="sort" data-sort="name">Nama</th>
                                        <th scope="col" class="sort" data-sort="description">Deskripsi</th>
                                        <th scope="col" class="sort" data-sort="price">Harga</th>
                                        <th scope="col" class="sort" data-sort="total_items">Total Item</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($packages as $id => $item)
                                    <tr class="text-center">
                                        <th> {{ $id + 1 }} </th>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->description }} </td>
                                        <td> {{"Rp. ".number_format($item->price, 0)}} </td>
                                        <td> {{ $item->total_items }} </td>
                                        <td>
                                            <a class="btn btn-icon btn-success btn-sm" href="{{ route('package.show', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                                <span class="btn-inner--text">detail</span>
                                            </a>
                                            <a class="btn btn-icon btn-warning btn-sm" href="{{ route('package.edit', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                                <span class="btn-inner--text">edit</span>
                                            </a>
                                            <form action="{{ route('package.destroy', $item->id) }}" method="post" class="my-0 d-inline">
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
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection