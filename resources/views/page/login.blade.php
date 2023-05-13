@extends('base')
@section('content')
    
<div class="space25">&nbsp;</div>
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h4 class="inner-title"> <b>Đăng nhập</b> </h4>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('index')}}"> Trang chủ </a> / <span> Đăng nhập </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <form action="{{route('login')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>
                @if (Session::has('flag'))
                    <div class="alert alert-{{Session::get('flag') }}">
                        {{Session::get('message')}}
                </div> 
                @endif

                <div class="col-sm-6">
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email"> <b>Email*</b> </label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="password"> <b>Mật khẩu*</b> </label>
                        <input type="password" name="password" required>
                    </div>
                    {{-- <div class="form-group">
                        <label class="label-agree-term"><span></span><span></span>
                            <a href="{{ route('password.request') }}"> Quên Mật khẩu? </a>
                        </label>
                    </div> --}}
                    <div class="social-login">
                        <a class="circle facebook" href=" {{ url('login/facebook')}} ">
                            <i class="fa fa-facebook-square fa-2x"></i>
                        </a>
    
                        <a class="circle google" href=" {{ url('login/google') }} ">
                            <i class="fa fa-google-plus-square fa-2x"></i>
                        </a>

                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary"> Đăng nhập </button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
