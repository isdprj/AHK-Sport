@extends('base')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h4 class="inner-title"> <b>Thanh toán<b> </h4>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
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
                    <h6>Thông tin thanh toán</h6>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="your_last_name">Họ và tên* :</label>
                        <input type="text" name ="name" value="{{$user->full_name}}" required>
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
                        <input type="text" value="{{$user->address}}" name="address" required>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" value="{{$user->email}}" name="email" required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" value="{{$user->phone_number}}" name="phone" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h6>Giỏ hàng</h6></div>
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
                                        @if ($pc['item']['id_category'] < 6 )
                                        <span class="select-title">Kích cỡ:
                                            <select class="wc-select-size" name = "size" required>
                                                <option value="null"></option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                            </select>                                           
                                        </span>
                                            @elseif($pc['item']['id_category'] == 8)
                                            <span class="select-title">Kích cỡ:

                                                <select class="wc-select-size" name="size" required>
                                                    <option value="null"></option>
                                                    <option value="s">S</option>
                                                    <option value="m">M</option>
                                                    <option value="l">L</option>
                                                    <option value="xl">XL</option>
                                                </select>                                           
                                            </span>
                                            @endif
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
                        <div class="your-order-head"><h6>Phương thức thanh toán</h6></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li>
                                    <input type="radio" class="input-radio" name="payment" value="cash" onclick="show1();">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng</label>
                                    <div id="payment_method_bacs" class="payment_box " >
                                    - Chỉ nhận hàng khi đơn hàng ở trạng thái "ĐANG GIAO HÀNG".
                                    <br>
                                    - Lưu ý kiểm tra mã đơn hàng, mã vận đơn và người gửi "TRƯỚC KHI THANH TOÁN".
                    
                                    </div>						
                                </li>

                                <li>
                                    <input type="radio" class="input-radio" name="payment" value="vnpay" onclick="show2();">
                                    <label for="payment_method_vnpay">Ví VNPay </label>	
                                    <div id="payment_method_vnpay" class="payment_box"> 
                                        <img width="33%" style="margin-left:10px;display:block" src="source/image/QR/banking.jpg" alt class="pull-right">
                                        <p>
                                         - Đảm bảo bạn có tài khoản VNPAY  đang hoạt động
                                        <br>
                                        - Có đủ số dư trong tài khoản VNPAY.   
                                        </p>
                                         
                                    </div>	
                                </li>
                                
                                <li>
                                    <input type="radio" class="input-radio" name="payment" value="bacs" onclick="show3();">
                                    <label for="payment_method_ib">Internet Banking/ Chuyển khoản </label>	
                                    <div id="payment_method_ib" class="payment_box">
                                        <img width="33%" src="source/image/QR/banking.jpg" alt class="pull-right">
                                        <p>
                                        - Thẻ ATM
                                        <br>
                                        - Đã đăng ký dịch vụ THANH TOÁN TRỰC TUYẾN và/hoặc NGÂN HÀNG ĐIỆN TỬ(internet Banking).    
                                        </p> 
                                    </div>	
                                </li>

                                <li>
                                    <input type="radio" class="input-radio" name="payment" value="zalopay" onclick="show4();">
                                    <label for="payment_method_zalopay">Zalo Pay</label>
                                    <div id="payment_method_zalopay" class="payment_box">
                                        <img width="33%" src="source/image/QR/zalo.jpg" alt class="pull-right">	
                                        <p>
                                         - Đảm bảo bạn có tài khoản ZALOPAY  đang hoạt động
                                        <br>
                                        - Có đủ số dư trong tài khoản ZALOPAY.   
                                        </p>
                                    </div>	
                                </li>
                                <li>
                                    <input type="radio" class="input-radio" name="payment" value="momo" onclick="show5();">
                                    <label for="payment_method_momo">Momo</label>	
                                    <div id="payment_method_momo" class="payment_box">
                                        <img width="33%" src="source/image/QR/momo.jpg" alt class="pull-right">   
                                        <p>
                                         - Đảm bảo bạn có ví điện tử MOMO đang hoạt động
                                        <br>
                                        - Có đủ số dư trong ví MOMO.   
                                        </p>                                  
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