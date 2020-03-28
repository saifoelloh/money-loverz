@extends('layouts.app', ['title' => __('Edit Customer')])

@section('content')
@include('users.partials.header', ['title' => __('Edit Customer')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Edit Customer
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('customer.index') }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('customer.update', $customer->id) }}" method="post" accept-charset="utf-8">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nama</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="nama makanan" value="{{ $customer->name }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                      @if ($customer->gender == 'male')
                                        <option selected value="male">Pria</option>
                                        <option value="female">Wanita</option>
                                      @else
                                        <option value="male">Pria</option>
                                        <option selected value="female">Wanita</option>
                                      @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="example@mail.co" value="{{ $customer->email }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">No Telp</label>
                                    <input class="form-control" type="text" name="phone" id="phone" value="{{ $customer->phone }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="address">Alamat</label>
                                    <textarea class="form-control" name="address" id="address" placeholder="Alamat rumah anda">{{ $customer->address}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-icon btn-warning" type="cancel">
                                            <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                            <span class="btn-inner--text">cancel</span>
                                        </button>
                                        <button class="btn btn-icon btn-success" type="submit">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text">submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection
