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

        @if (Session::has('flag'))
        <div class="text-center alert alert-{{Session::get('flag') }}">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="col-sm-3"></div>
        <form action="{{route('login')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">

                <div class="col-sm-6">
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email"><b>Email*</b></label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="form-block">
                        <label for="password"><b>Mật khẩu*</b></label>
                        <input type="password" name="password" required class="form-control">
                    </div>

                    {{-- <div class="form-group">
                        <label class="label-agree-term"><span></span><span></span>
                            <a href="{{ route('password.request') }}"> Quên Mật khẩu? </a>
                    </label>
                </div> --}}
                <div class="space10">&nbsp;</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Đăng nhập </button>
                </div>
                <div class="space10">&nbsp;</div>
                <hr>
                <div class="social-login">
                    <p class="text-center">Hoặc đăng nhập bằng</p>
                    <br>
                    <div class="text-center">
                        <a class="circle facebook" href="https://www.facebook.com/login.php">
                            <img width="5%" src="source/image/social/fb.png" alt="Facebook" style="margin-right: 5px;">
                        </a>
                        <a class="circle google" href="{{ url('login/google') }}">
                            <img width="5%" src="source/image/social/gmail.png" alt="Google" style="margin-left: 5px;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
    </div>
    </form>
</div> <!-- #content -->
</div> <!-- .container -->
@endsection