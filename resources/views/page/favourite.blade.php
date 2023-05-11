@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm yêu thích</h6>
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
    <div class="col-sm-9">
        <div class="beta-products-list">
            <h4>Tất cả sản phẩm yêu thích</h4>
            <div class="beta-products-details">
                <p class="pull-left">Có {{count($favouriteProduct)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach($favouriteProduct as $fp)
                <div class="col-sm-4">
                    <div class="single-item">
                        @if($fp->promotion_price!=0)
                        <div class="ribbon-wrapper">
                            <div class="ribbon sale">Sale</div>
                        </div>
                        @endif
                    <div class="single-item">
                        <div class="single-item-header">
                            <a href="{{route('product',$fp->id)}}"><img src="source/image/product/{{$fp->image}}" alt=""></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$fp->name}}</p>
                            <p class="single-item-price">
                                @if ($fp->promotion_price == 0)
                                <span class="flash-sale"><i>{{$fp->unit_price}}</i> đ</span>
                                @else 
                                <span class="flash-del"><i>{{$fp->unit_price}}</i> đ</span>
                                <span class="flash-sale"><i>{{$fp->promotion_price}}</i> đ</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('cart',$fp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('product',$fp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            
        </div> <!-- .beta-products-list -->
        </div>
        <div class="space50">&nbsp;</div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection