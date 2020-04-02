@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="container">
        <div class="card w-75 mx-auto">
          <div class="card-body">
            <h2 class="text-center">Pilih Menu</h2>
            <form action="" method="POST" accept-charset="utf-8">
              <div class="form-group">
                <label for="name" class="form-label">Menu</label>
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-bars"></i>
                    </span>
                  </div>
                  <input class="form-control" placeholder="John Smith" type="text" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Tanggal Kirim</label>
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input class="form-control" placeholder="John Smith" type="date" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Optional</label>
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-plus"></i></span>
                  </div>
                  <input class="form-control" placeholder="John Smith" type="text" name="name">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
