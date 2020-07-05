<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-notification" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
    <div class="modal-content bg-gradient-info">

      <!-- START Form -->
      <form action="{{ route('make-order.store') }}" method="POST">
        @csrf
        <div class="modal-header pb-0">
          <h6 class="modal-title" id="modal-title-notification">Formulir Pemesanan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <!-- START Modal-Body -->
        <div class="modal-body pb-0 pt-1">
          <div class="form-group">
            <label for="name" class="form-label">Nama</label>
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input class="form-control" placeholder="John Smith" type="text" name="name" value="{{ isset($customer) ? $customer->nama : '' }}">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="phone" class="form-label">No Telepon (WA)</label>
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input class="form-control" placeholder="08xxxx" type="text" name="phone" value="{{ isset($customer) ? $customer->phone : '' }}">
              </div>
            </div>
            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input class="form-control" placeholder="Email" type="email" name="email" value="{{ isset($customer) ? $customer->email : '' }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="kecamatan" class="form-label">Kecamatan Pengiriman</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <select id="kecamatan" class="form-control" name="kecamatan">
                @foreach ($order->daftar['kecamatan'] as $item)
                  <option value="{{ $item }}">
                  {{ ucwords($item) }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="form-label">Alamat Lengkap</label>
            <div class="input-group input-group-alternative">
              <textarea class="form-control" name="alamat"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <div class="form-group">
                <label for="name" class="form-label">Pilih Paket</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box-open"></i></span>
                  </div>
                  <select id="package" class="form-control" name="package">
                    @foreach ($packages as $package)
                      <option value="{{ $package['id'] }}">
                      {{ ucwords($package['name']) }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="name" class="form-label">Pilih Waktu</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box-open"></i></span>
                  </div>
                  <select class="form-control" name="waktu">
                    @foreach ($order->daftar['waktu'] as $time)
                      <option value="{{ $time }}">
                      {{ ucwords($time) }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12 col-md-9">
              <a href="#" class="btn btn-outline-white d-block d-md-inline-block ml-auto mb-2" data-dismiss="modal" data-toggle="modal" data-target="#modal-check">
                Cek Pesanan
              </a>
            </div>
            <div class="col-12 col-md-3 text-right">
              <button type="submit" class="btn btn-white btn-block ml-auto">
                Buat Pesanan
              </button>
            </div>
          </div>


        </div><!-- END Modal-Body -->

        <div class="modal-footer pt-0">
          
          
        </div>
      </form><!-- END Form -->

    </div>
  </div>
</div>
