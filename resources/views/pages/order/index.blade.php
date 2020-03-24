@extends('layouts.app', ['title' => 'Pesanan'])

@section('content')
@include('users.partials.header', ['title' => __('Daftar Pesanan')])
<div class="container-fluid mt--7">
    <div class="row">
        @if(session()->get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text">
                {{session()->get('error')}}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Daftar Pesanan
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('order.create') }}">
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
                                        <th>Nama Pemesan</th>
                                        <th>Paket Pesanan</th>
                                        <th>Pembayaran Via</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($orders as $id => $item)
                                    <tr class="text-center">
                                        <th>{{ $id + 1 }}</th>
                                        <td>{{ $item['customer']->name }}</td>
                                        <td>{{ $item['package']->name }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                        <td>{{"Rp. ".number_format($item['package']->price, 0)}}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a class="btn btn-icon btn-success btn-sm" href="{{ route('order.show', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                                <span class="btn-inner--text">detail</span>
                                            </a>
                                            <a class="btn btn-icon btn-warning btn-sm" href="{{ route('order.edit', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                                <span class="btn-inner--text">edit</span>
                                            </a>
                                            <form action="{{ route('order.destroy', $item->id) }}" method="post" class="my-0 d-inline">
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