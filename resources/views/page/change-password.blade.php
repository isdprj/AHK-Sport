@extends('base')
@section('content')
<div class="space25">&nbsp;</div>
    <div class="container py-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <form action="{{ route('reset-password') }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="card shadow">

                        @if (Session::has("success"))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                        <div class="inner-header">
                            <div class="container">
                                <div class="pull-left">
                                    <h6 class="inner-title"> Đổi Mật Khẩu </h6>
                                </div>
                                <div class="pull-right">
                                    <div class="beta-breadcrumb">
                                        <a href="{{route('index')}}"> Trang chủ</a> / <span> Đổi Mật Khẩu </span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="card-body px-4">
                            <div class="card-header">
                                <h5 class="card-title"> Quên Mật Khẩu </h5>
                            <div class="card-body px-4">
                            <input type="hidden" name="email" value="{{ $email }} "/>

                            <div class="form-group py-2">
                                <label> Mật khẩu </label>
                                <input type="password" name="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" value="{{ old('password') }}" placeholder="New Password">
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group py-2">
                                <label> Confirm Password </label>
                                <input type="password" name="confirm_password" class="form-control {{$errors->first('confirm_password') ? 'is-invalid' : ''}}" value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                                {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> Đổi Mật Khẩu </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="space25">&nbsp;</div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@endsection