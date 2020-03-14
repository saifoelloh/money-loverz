@extends('layouts.app', ['title' => __('Adding Menu')])
@section('content')
@include('users.partials.header', ['title' => __('Detail Menu')])

<div class="container-fluid mt--7">
    <div class="row">
        <!-- Detail Menu -->
        <div class="col-xs-12 col-md-4">
            <div class="card shadow">
                <img class="card-img-top" src="{{ $menu->photo }}" alt="" />
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-muted" value="{{ $menu->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-muted" disabled>
                            {{ $menu->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-muted" value="{{ $menu->price }}" disabled>
                        </div>
                    </form>
                    <a class="btn btn-icon btn-primary btn-block" href="{{ route('menu.index') }}">
                        <span class="btn-inner--text">kembali</span>
                        <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    </a>
                </div>
            </div>
        </div><!-- END of Detail -->
        <!-- List of Optional Menus -->
        <div class="col-xs-12 col-md-8">
            @include('pages.optional-menu.index', [ 'options' => $options, 'menu_id' => $menu->id ])
        </div><!-- END of Optionals List -->
    </div>
    @include('layouts.footers.auth')
</div>
@endsection