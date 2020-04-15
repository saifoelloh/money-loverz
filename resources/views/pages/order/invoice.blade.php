<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Satu Pintu - Kitchen') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo-svg.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/jquery.dataTables.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon') }}/css/argon-design-system.css" rel="stylesheet">
    
    <!-- CUSTOM CSS-->
    <link type="text/css" href="{{ asset('argon') }}/css/custom.css" rel="stylesheet">

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Autocomplete JQui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body class="landing-page">
    
    <div class="main-content">
        <div class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <h4>Invoice PKG011104200001</h4>
                    <div><small>Tanggal pesanan : 23 April 2020, 13:41 WIB</small></div>

                </div>

                <div class="col-md-6 text-right">
                    <img src="{{ asset('argon') }}/img/brand/logo-black.png" class="logo-invoice" />
                    <div><small>Jl. asokd askdo askdoasd askdoaskd</small></div>
                </div>
            </div>
            <hr class="mt-2">

            <div class="row">

                <div class="col-md-7">
                    
                    <table class="table table-borderless table-invoice">
                        <tr>
                            <th colspan="3">Informasi Pesanan</th>
                        </tr>
                        <tr>
                            <td>Jenis Pesanan</td>
                            <td width="10">:</td>
                            <td>Reguler (Lunch)</td>
                        </tr>
                        <tr>
                            <td>Paket</td>
                            <td>:</td>
                            <td>Paket Coba (3 Item)</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Confirmed</td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td>Transfer</td>
                        </tr>
                    </table>

                </div>

                <div class="col-md-5">
                    <table class="table table-borderless table-invoice">
                        <tr>
                            <th colspan="3">Informasi Pelanggan</th>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td width="10">:</td>
                            <td>bang gofur</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>gofur@gmail.com</td>
                        </tr>
                        <tr>
                            <td>No telp.</td>
                            <td>:</td>
                            <td>081234567</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-12">
                    
                    <table class="table table-bordered table-invoice">
                        <tr>
                            <th colspan="6" class="text-center">Detail Pesanan</th>
                        </tr>
                        <tr>
                            <th>No.</th>
                            <th>Nama Menu</th>
                            <th>Tambahan</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Nasi mangkuk ayam</td>
                            <td>Nasi merah</td>
                            <td>Mon, 13-Apr-2020</td>
                            <td>1</td>
                            <td class="text-right">18000</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Nasi mangkuk ayam</td>
                            <td>-</td>
                            <td>Sun, 18-Apr-2020</td>
                            <td>1</td>
                            <td class="text-right">18000</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Nasi mangkuk ayam</td>
                            <td>Nasi merah</td>
                            <td>Tue, 27-Apr-2020</td>
                            <td>1</td>
                            <td class="text-right">18000</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="text-center">Total Harga</th>
                            <td class="text-right">48000</td>
                        </tr>
                    </table>

                </div>

                <div class="col-md-7">

                    <table class="table table-borderless table-invoice">
                        <tr>
                            <th>Alamat Pengiriman</th>
                        </tr>
                        <tr>
                            <td>jl. Bayumanik , 123123, 123113 semarang.</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-5 text-right">

                    <table class="table table-borderless table-invoice">
                        <tr>
                            <th>Dikonfirmasi Oleh</th>
                        </tr>
                        <tr>
                            <td>satu pintu (13/04/2020, 12:03 WIB)</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

    <!-- data-table -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- autocomplete JQui -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- optional JS -->
    @stack('js')

</body>

</html>
