@extends('base')
@section('content')
    

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thay đổi mật khẩu</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Thay đổi mật khẩu</span>
            </div>
            <div class="clearfix">
                @if (Session::has('message'))
                <div class="alert alert-sucess" role ="alert">
                    {{ Session::get('message') }}
            @endif
            <form action="{{ route('forget.password.post') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="email_address" class ="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address"
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')  }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection