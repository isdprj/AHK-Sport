@extends('base')

@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="row">
            <div class="space60">&nbsp;</div>
            <div class="col-sm-3">
                <ul class="aside-menu">
                    <li><a href="{{route('account')}}">Thông tin người dùng</a></li>
                    <li><a href="{{route('order')}}">Danh sách đơn hàng</a></li>
                    <li><a href="{{route('favourite')}}">Sản phẩm yêu thích</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
<table class="table">
    <thead>
    <tr>
        <th style="width: 200px" class="mg-all-8">Thông tin</th>
        <th>Chi tiết</th>
        <th style="width: 100px">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>{{ $bills->id }}</td>
        </tr>
        <tr>
            <td>Danh sách mặt hàng</td>
            <td>
                <table>
                    <thead>
                        <tr>
                            <th class="mg-all-8">Tên mặt hàng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($detailProduct as $dt)
                        <tr>
                            <td class="mg-all-8">{{$dt->name}}</td>
                            <td>
                            @if ($dt->promotion_price > 0)
                            <i>{{number_format($dt->promotion_price)}}đ</i>
                            @else
                            <i>{{number_format($dt->unit_price)}}đ</i>
                            @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </td>
        </tr>
        <tr>
            <td>Tổng tiền</td>
            <td><i>{{$bills->total}}đ</i></td>
        </tr>
        <tr>
            <td>Ngày đặt</td>
            <td>{{date($bills->created_at)}}</td>
        </tr>
        <tr>
            <td>Phương thức thanh toán</td>
            <td>
                @if ($bills->payment == 'bacs') 
                Chuyển khoản trực tiếp
                @elseif ($bills->payment == 'cash')
                Thanh toán bằng tiền mặt
                @elseif($bills->payment == 'momo')
                Ví Momo
                @elseif($bills->payment == 'vnpay')
                Ví VNPay
                @elseif($bills->payment == 'zalopay')
                Ví ZaloPay
                @endif
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection