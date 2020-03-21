@extends('layouts.app', ['title' => __('Edit FAQ')])

@section('content')
@include('users.partials.header', ['title' => __('Edit FAQ')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-6">
                                Edit FAQ
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-icon btn-primary btn-sm" href="{{ route('faq.index') }}">
                                    <span class="btn-inner--text">kembali</span>
                                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST" accept-charset="utf-8">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="question">Pertanyaan</label>
                                    <input class="form-control" type="text" name="question" id="question" value="{{ $faq->question }}" placeholder="apa itu satu pintu ?" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="answer">Jawaban</label>
                                    <textarea class="form-control" name="answer" id="answer">
                                    {{$faq->answer}}
                                    </textarea>
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