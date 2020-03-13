@extends('layouts.app', ['title' => 'Menu'])

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Daftar Menu
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-success btn-sm" href="{{ route('menu.create') }}">
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
                                        <th scope="col" class="sort" data-sort="status">Harga</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($menus as $item)
                                    <tr class="text-center">
                                        <th>
                                            {{ $item->id }}
                                        </th>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->price }}
                                        </td>
                                        <td>
                                            <a class="btn btn-icon btn-primary btn-sm" href="{{ route('menu.edit', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                                <span class="btn-inner--text">detail</span>
                                            </a>
                                            <a class="btn btn-icon btn-danger btn-sm" href="{{ route('menu.edit', $item->id) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                                <span class="btn-inner--text">delete</span>
                                            </a>
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