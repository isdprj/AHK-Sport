@extends('base')

@section('head')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h4 class="inner-title"><b>Danh mục sản phẩm</b></h4>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Sản phẩm</span>
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
                        <h6>Tất cả sản phẩm</h6>
                        <div class="beta-products-details">
                            @if (count($productShoes) == 0)
                            <p class="pull-left">Không có sản phẩm nào liên quan</p>
                            @else
                            <p class="pull-left">Số lượng: {{count($productShoes)}}</p>
                            @endif
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($productShoes as $ps)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($ps->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('product',$ps->id)}}"><img src="source/image/product/{{$ps->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <a href="{{route('product',$ps->id)}}"><p class="single-item-title">{{$ps->name}}</p></a> 
                                        <p class="single-item-price">
                                            @if ($ps->promotion_price == 0)
                                            <span class="flash-sale"><i>{{number_format($ps->unit_price)}}đ</i> </span>
                                            @else 
                                            <span class="flash-del"><i>{{number_format($ps->unit_price)}}đ</i></span>
                                            <span class="flash-sale"><i>{{number_format($ps->promotion_price)}}đ</i></span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('cart',$ps->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',$ps->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        @if(Auth::check())
                                        @if(!session('liked.'.$ps->id))
                                        <a href="{{route('like',$ps->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($ps->like)                                            
                                            <i class="fa fa-heart"></i>
                                            @else
                                            <i class="ti-heart "></i>
                                            @endif
                                        </a>
                                        @else
                                        <a href="{{route('unlike',$ps->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($ps->unlike)
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
</div> <!-- .container -->
@endsection