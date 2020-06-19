@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <div class="header bg-gradient-dark py-7 py-lg-8">
    <div class="page-header">
      <div class="container">
        <div class="card mx-auto">
          <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <table class="table-invoice" width="100%">
                        <tr>
                            <th width="20%">No Telp.</th>
                            <td width="10">:</td>
                            <td>0812 345 678</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>AhmadSubagyo@gmail.com</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success btn-icon" data-toggle="modal" data-target="#modal-form">
                        <span class="btn-inner--icon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="nav-link-inner--text">Buat Pesanan Baru</span>
                    </button>
                </div>
            </div>

            <h4 class="text-center pt-3">Riwayat Order</h4>
            <hr>
            <table class="table table-borderless table-hover text-center">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No Order</th>
                  <th>Tanggal Order</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1.</td>
                      <td>09012323</td>
                      <td>12 Mar 2020</td>
                      <td>
                          <span class="badge badge-primary">Created</span>
                      </td>
                      <td>
                          <button class="btn btn-sm btn-warning">Detail</button>
                      </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>03112427</td>
                    <td>24 Feb 2020</td>
                    <td>
                        <span class="badge badge-success">Finish</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning">Detail</button>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->

@include('layouts.modals.checkorder') 

@endsection
