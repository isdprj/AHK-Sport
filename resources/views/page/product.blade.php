@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$product->name}}</h6>
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
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        @if ($product->promotion_price > 0)
                        <div class="ribbon-wrapper">
                            <div class="ribbon sale">Sale</div>
                        </div>
                        @endif
                        <img src="source/image/product/{{$product->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$product->name}}</p>
                            @if ($product->promotion_price == 0)
                            <span class="flash-sale"><i>{{number_format($product->unit_price)}}đ</i></span>
                            @else
                            <span class="flash-del"><i>{{number_format($product->unit_price)}}đ</i></span>
                            <span class="flash-sale"><i>{{number_format($product->promotion_price)}}đ</i></span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>
                        <div class="variation-img-list">
                            @foreach ($productVariation as $pv)
                            <img src="source/image/product/{{$pv->image}}" alt="" class="variation-img">
                            @endforeach
                        </div>
                        <div class="single-item-desc">
                            <p>{{$product->description}}</p>
                        </div>

                        <div class="space20">&nbsp;</div>

                        <div class="single-item-options">
                            @if ($product->id_category < 6) <p class="select-title">Kích cỡ:&nbsp;</p>
                                <div class="col-sm-3">
                                    <select class="wc-select" name="size">
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                    </select>
                                </div>
                                @elseif ($product->id_category == 8)
                                <p class="select-title">Kích cỡ:&ensp;</p>
                                <div class="col-sm-3">
                                    <select class="wc-select" name="size">
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                    </select>
                                </div>
                                @endif
                                </div>
                                <div class="space20">&nbsp;</div>
                                <p>Giỏ hàng:&ensp; <a class="add-to-cart" href="{{route('cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></p>
                                <div class="clearfix"></div>
                        
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$product->stats}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>Chưa có đánh giá nào</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm liên quan</h4>
                    <br>
                    <div class="row">
                        @foreach ($relatedProduct as $rp)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if ($rp->promotion_price > 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                @endif
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('product',$rp->id)}}"><img src="source/image/product/{{$rp->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$rp->name}}</p>
                                        @if ($product->promotion_price == 0)
                                        <span class="flash-sale"><i>{{number_format($rp->unit_price)}}đ</i> </span>
                                        @else
                                        <span class="flash-del"><i>{{number_format($rp->unit_price)}}đ</i></span>
                                        <span class="flash-sale"><i>{{number_format($rp->promotion_price)}}đ</i></span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('cart',$rp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',$rp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('product',1)}}"><img src="source/image/product/shoes_adidas1.1.png" alt=""></a>
                                <div class="media-body">
                                    ADIDAS PREDATOR ACCURACY .4 TF
                                    <span class="beta-sales-price">1.390.000đ</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('product',27)}}"><img src="source/image/product/clothes2.png" alt=""></a>
                                <div class="media-body">
                                    BỘ QUẦN ÁO BÓNG ĐÁ KAMITO Q2
                                    <span class="beta-sales-price">199.000đ</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('product',18)}}"><img src="source/image/product/shoes_kamito3.1.png" alt=""></a>
                                <div class="media-body">
                                    GIÀY ĐÁ BÓNG KAMITO QH19 AS TF
                                    <span class="beta-sales-price">555.000đ</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('product',32)}}"><img src="source/image/product/balo3.1.png" alt=""></a>
                                <div class="media-body">
                                    BALO XẾP GỌN NEYMARSPORT 2023
                                    <span class="beta-sales-price">139.000đ </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection