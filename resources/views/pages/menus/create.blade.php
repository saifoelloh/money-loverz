@extends('layouts.app', ['title' => __('Adding Menu')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xs-12 col-md-5">
                <div class="card shadow">
                    <div class="card-title">
                    </div>
                    <div class="card-body">
                      <form action="" method="post" accept-charset="utf-8">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label" for="name">Nama</label>
                              <input class="form-control" type="text" name="name" id="name" placeholder="nama makanan"/>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="description">Deskripsi</label>
                              <textarea class="form-control" name="description" id="description" placeholder="description makanan"></textarea>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="price">Harga</label>
                              <input class="form-control" type="number" name="price" id="price" placeholder="harga makanan"/>
                            </div>
                            <div class="form-group">
                              <label class="form-label" for="photo">foto</label>
                              <input class="form-control" type="file" name="photo" id="photo" />
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

