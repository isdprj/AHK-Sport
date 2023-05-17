@extends('base')
@section('content')
@if (Session::has('flag'))
<div class="alert alert-{{Session::get('flag') }}">
    {{Session::get('message')}}
</div>
@endif
@if (Session::has('logoutMessage'))
<div class="alert alert-success">
    {{Session::get('logoutMessage')}}
</div>
@endif
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    @foreach ($slider as $sld)
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sld->image}}" data-src="source/image/slide/{{$sld->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sld->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h5><b>Sản phẩm hot</b></h5>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($newProduct as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product',$new->id)}}"><img src="./source/image/product/{{$new->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->name}}</p>
                                        <p class="single-item-price">
                                            @if ($new->promotion_price == 0)
                                            <span class="flash-sale"><i>{{number_format($new->unit_price)}}đ</i></span>
                                            @else
                                            <span class="flash-del"><i>{{number_format($new->unit_price)}}đ</i></span>
                                            <span class="flash-sale"><i>{{number_format($new->promotion_price)}}đ</i></span>
                                            @endif

                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('cart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        @if(Auth::check())
                                        @if(!session('liked.'.$new->id))
                                        <a href="{{route('like',$new->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($new->like)
                                            <i class="fa fa-heart"></i>
                                            @else
                                            <i class="ti-heart "></i>
                                            @endif
                                        </a>
                                        @else
                                        <a href="{{route('unlike',$new->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($new->unlike)
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
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space60">&nbsp;</div>
                    <div class="beta-products-list">
                        <h5><b>Các sản phẩm đang được giảm giá</b></h5>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($saleProduct as $sp)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    <div class="single-item-header">
                                        <a href="{{route('product',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del"><i>{{number_format($sp->unit_price)}}đ</i></span>
                                            <span class="flash-sale"><i>{{number_format($sp->promotion_price)}}đ</i></span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('cart',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        @if(Auth::check())
                                        @if(!session('liked.'.$sp->id))
                                        <a href="{{route('like',$sp->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($sp->like)
                                            <i class="fa fa-heart"></i>
                                            @else
                                            <i class="ti-heart "></i>
                                            @endif
                                        </a>
                                        @else
                                        <a href="{{route('unlike',$sp->id)}}" class="btn alert-danger flex-fill favourite">
                                            @if($sp->unlike)
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
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$saleProduct->links()}}</div>
                        <div class="space40">&nbsp;</div>
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
        </div> <!-- end section with sidebar and main content -->
        <div class="space20">&nbsp;</div>
        <div id="news" class="space-top-none">
            <h5><b>Có gì mới?</b></h5>
            <div class="row">
                <div class="col-sm-4">
                    <div class="news-section">
                        <div class="news-box">
                            <div class="news-img">
                                <a href="https://www.24h.com.vn/bong-da/man-city-arsenal-dai-chien-ai-se-khong-may-nhap-hoi-nhung-a-quan-vi-dai-nhat-c48a1461451.html"><img src="source/image/product/1.jpg" alt="" style="transition: transform 0.3s ease; transform-origin: center;">
                                    <style>
                                        img:hover {
                                            transform: scale(1.05);
                                        }
                                    </style>
                                </a>
                            </div>
                            <div class="news-title">
                                <a href="https://www.24h.com.vn/bong-da/man-city-arsenal-dai-chien-ai-se-khong-may-nhap-hoi-nhung-a-quan-vi-dai-nhat-c48a1461451.html">Man City - Arsenal đại chiến: Ai sẽ không may "nhập hội" những Á quân vĩ đại nhất?</a>
                            </div>
                            <br>
                            <div class="news-content">"Ai thua cuộc chiến Man City - Arsenal sẽ nhập hội những đội Á quân vĩ đại nhất."</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="news-section">
                        <div class="news-box">
                            <div class="news-img">
                                <a href="https://www.24h.com.vn/bong-da/tuong-thuat-bong-da-west-ham-liverpool-lu-doan-do-tiep-da-thang-hoa-ngoai-hang-anh-c48a1461612.html"><img src="source/image/product/2.jpg" alt="" style="transition: transform 0.3s ease; transform-origin: center;">
                                    <style>
                                        img:hover {
                                            transform: scale(1.05);
                                        }
                                    </style>
                                </a>
                            </div>
                            <div class="news-title">
                                <a href="https://www.24h.com.vn/bong-da/tuong-thuat-bong-da-west-ham-liverpool-lu-doan-do-tiep-da-thang-hoa-ngoai-hang-anh-c48a1461612.html">Tường thuật bóng đá West Ham - Liverpool: Kỳ vọng vào Salah (Ngoại hạng Anh)</a>
                            </div>
                            <br>
                            <div class="news-content">"(West Ham - Liverpool, 1h45, 27/4, vòng 33 Ngoại hạng Anh) Salah đang có phong độ cao ở thời gian gần đây trong màu áo Liverpool.</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="news-section">
                        <div class="news-box">
                            <div class="news-img">
                                <a href="https://www.24h.com.vn/bong-da/tuong-thuat-bong-da-chelsea-brentford-nguy-co-tiep-tuc-tham-hoa-ngoai-hang-anh-c48a1461594.html">
                                    <img src="source/image/product/3.jpg" alt="" img src="source/image/product/1.jpg" alt="" style="transition: transform 0.3s ease; transform-origin: center;">
                                    <style>
                                        img:hover {
                                            transform: scale(1.05);
                                        }
                                    </style>
                                </a>

                            </div>
                            <div class="news-title">
                                <a href="https://www.24h.com.vn/bong-da/tuong-thuat-bong-da-chelsea-brentford-nguy-co-tiep-tuc-tham-hoa-ngoai-hang-anh-c48a1461594.html">Tường thuật bóng đá Chelsea - Brentford: Lampard xác nhận tin xấu 2 trụ cột (Ngoại hạng Anh)</a>
                            </div>
                            <br>
                            <div class="news-content">"(Chelsea - Brentford, 1h45, 27/4, vòng 33 Ngoại hạng Anh) HLV Lampard có những chia sẻ không mấy tích cực về lực lượng Chelsea trước ngày đấu Brentford.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .main-content -->
</div> <!-- #content -->
@endsection