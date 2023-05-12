@extends('base')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">
                @if($bills->status == "Hoàn tất")
                Vì sao bạn muốn hoàn trả hàng?
                @endif
                Vì sao bạn muốn hủy đơn hàng
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
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Hãy cho chúng tôi biết</label>
                                    <textarea name="note" id="note" class="form-control"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="Xác nhận" name="submit" class="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        window.onload = function() {
            CKEDITOR.replace( 'note' );
    };
    </script>
@endsection