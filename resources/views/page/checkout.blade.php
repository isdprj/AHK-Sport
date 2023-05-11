@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thanh toán</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Thanh toán</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            @if (Session::has('anno'))
                <div class="alert alert-success">
                    {{Session::get('anno')}}
                </div>
            @endif
        </div>
        <form action="{{route('checkout')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Thông tin thanh toán</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="your_last_name">Họ và tên* :</label>
                        <input type="text" name ="name" required>
                    </div>

                    <div class="form-block">
                        <label>Giới tính</label>
                        <input type="radio" id="gender" class="input-radio" name="gender" value="nam" style="width: 10%">
                        <span style="margin-right: 10%"> Nam</span>
                        <input type="radio" id="gender" class="input-radio" name="gender" value="nữ" style="width: 10%">
                        <Span>Nữ</Span>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" name="address" value="Street Address" required>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" name="phone" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Giỏ hàng</h5></div>
                        <div class="your-order-body">
                            <div class="your-order-item">
                                <div>
                                    @if(Session::has('cart'))
                                    @foreach($product_cart as $pc)
                                <!--  one item	 -->
                                    <div class="media">
                                        <img width="35%" src="source/image/product/{{$pc['item']['image']}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$pc['item']['name']}}</p>
                                            {{-- <span class="color-gray your-order-info">Color: Red</span>
                                            <span class="color-gray your-order-info">Size: M</span> --}}
                                            <span class="color-gray your-order-info">Đơn giá: <b>{{number_format($pc['price'])}}</b> </span>
                                            <span class="color-gray your-order-info">Số lượng: <b>{{$pc['qty']}}</b> </span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">
                                    @if(Session::has('cart'))
                                    {{number_format(Session('cart')->totalPrc)}}
                                    @endif
                                    Đồng
                                </h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Phương thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="bacs" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Chuyển khoản trực tiếp </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                    Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Lưu ý: Đơn hàng của bạn sẽ không được giao cho đến khi thông tin thanh toán của bạn được xác nhận thành công.
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="cheque" data-order_button_text="">
                                    <label for="payment_method_cheque">Thanh toán bằng Séc </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Vui lòng gửi séc của bạn đến Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.
                                    </div>						
                                </li>
                                
                                <li class="payment_method_paypal">
                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment" value="paypal" data-order_button_text="Proceed to PayPal">
                                    <label for="payment_method_paypal">Thanh toán bằng PayPal </label>
                                    <div class="payment_box payment_method_paypal" style="display: none;">
                                        Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal
                                    </div>						
                                </li>
                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
    
@endsection