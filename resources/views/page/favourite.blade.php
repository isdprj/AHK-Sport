@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h4 class="inner-title"><b>Sản phẩm yêu thích</b></h4>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Sản phẩm yêu thích</span>
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
                    <div class="beta-products-list">
                        <h6>Tất cả sản phẩm yêu thích</h6>
                        <div class="beta-products-details">
                            @if (count($favouriteProduct) == 0)
                                <p class="pull-left">Chưa có sản phẩm nào</p>
                            @else
                                <p class="pull-left">Số lượng: {{count($favouriteProduct)}}</p>
                            @endif
                            <div class="clearfix"></div>
                        </div>

                        <div class="row" style="display: flex; flex-wrap: wrap;">
                            @foreach($favouriteProduct as $fp)
                                <div class="col-sm-4" style="flex: 0 0 33.33%; max-width: 33.33%;">
                                    <div class="single-item">
                                        @if($fp->promotion_price!=0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product',$fp->id)}}"><img src="source/image/product/{{$fp->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$fp->name}}</p>
                                            <p class="single-item-price">
                                                @if ($fp->promotion_price == 0)
                                                    <span class="flash-sale"><i>{{$fp->unit_price}}đ</i></span>
                                                @else 
                                                    <span class="flash-del"><i>{{$fp->unit_price}}đ</i></span>
                                                    <span class="flash-sale"><i>{{$fp->promotion_price}}đ</i></span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('cart',$fp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product',$fp->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
