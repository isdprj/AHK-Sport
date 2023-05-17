@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h4 class="inner-title"> <b>Kết quả tìm kiếm</b> </h4>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Kết quả tìm kiếm</span>
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
                        <li><a href="{{route('shoes')}}"><b>+ Giày bóng đá</b> </a></li>
                        @foreach($productType1 as $pt1)
                        <li><a href="{{route('product_categories',$pt1->id)}}"> &nbsp;- {{$pt1->name}}</a></li>
                        @endforeach
                        <li><a href="{{route('ultility')}}"><b>+ Phụ kiện</b> </a></li>
                        @foreach($productType2 as $pt2)
                        <li><a href="{{route('product_categories',$pt2->id)}}"> &nbsp;- {{$pt2->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h6>Sản phẩm liên quan</h6>
                        <div class="beta-products-details">
                            @if (count($productSearch) == 0)
                            <p class="pull-left">Không có sản phẩm nào liên quan</p>
                            @else
                            <p class="pull-left">Số lượng: {{count($productSearch)}}</p>
                            @endif
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($productSearch as $pse)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($pse->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{route('product',$pse->id)}}"><img src="source/image/product/{{$pse->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$pse->name}}</p>
                                            <p class="single-item-price">
                                                @if ($pse->promotion_price == 0)
                                                <span class="flash-sale"><i>{{$pse->unit_price}}đ</i></span>
                                                @else
                                                <span class="flash-del"><i>{{$pse->unit_price}}đ</i>/span>
                                                <span class="flash-sale"><i>{{$pse->promotion_price}}đ</i></span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('cart',$pse->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product',$pse->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                            @if(Auth::check())
                                        @if(!session('liked.'.$pse->id))
                                        <a href="{{route('like',$pse->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($pse->like)                                            
                                            <i class="fa fa-heart"></i>
                                            @else
                                            <i class="ti-heart "></i>
                                            @endif
                                        </a>
                                        @else
                                        <a href="{{route('unlike',$pse->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($pse->unlike)
                                            <i class="ti-heart "></i>
                                            @else
                                            <i class="fa fa-heart"></i>
                                            @endif
                                        </a>
                                        @endif
                                        @else
                                        <a href="{{route('login')}}" class="btn alert-danger flex-fill favourite">
                                            <i class="ti-heart "></i>
                                        </a>                                             
                                        @endif
                                            <div class="clearfix"></div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- .beta-products-list -->
                    </div>
                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection