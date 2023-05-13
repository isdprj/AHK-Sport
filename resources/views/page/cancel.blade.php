@extends('base')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                Cho chúng tôi biết lí do
            </h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Thông tin người dùng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        <li><a href="{{route('account')}}">Thông tin người dùng</a></li>
                        <li><a href="{{route('order')}}">Danh sách đơn hàng</a></li>
                        <li><a href="{{route('favourite')}}">Sản phẩm yêu thích</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <form action="{{route('cancel',$bills->id)}}" method="PUT">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="Name">Hãy cho chúng tôi biết</label>
                                    <textarea name="note" id="note" class="form-control"></textarea>    
                            </div>
                        </div>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- jQuery -->
<script src="/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/templates/dist/js/adminlte.min.js"></script>

<script src="/source/assets/dest/js/main.js"></script>
<script>
        window.onload = function() {
            CKEDITOR.replace( 'note' );
    };
</script>
@endsection