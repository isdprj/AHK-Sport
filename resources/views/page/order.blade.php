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
@if (count($bills) == 0)
    <div class="text-center">Bạn chưa có đơn hàng nào</div>
@else
<table class="table">
    <thead>
        <tr>
            <th style="width: 100px">Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Chi tiết</th>
            <th>Tình trạng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bills as $bill)
        <tr>
            <td>{{ $bill->id }}</td>
            <td>{{date($bill->date_oreder)}}</td>
            {{-- @foreach ($detailProduct as $dt)
            <td>{{$dt->name}}</td> 
            <td>
                @if ($dt->promotion_price > 0)
                {{number_format($dt->promotion_price)}}đ
                @else
                {{number_format($dt->unit_price)}}đ
                @endif
            </td>
            <td>{{$dt->quantity}}</td>
            @endforeach --}}
            <td><a href="{{route('detail',$bill->id)}}">Xem chi tiết</a></td>
            <td>{{$bill->status}}</td>
            <td>
            @if($bill->status != "Đã hủy đơn")    
                <a href="{{route('cancel',$bill->id)}}" class="btn btn-danger">
               @if ($bill->status == "Hoàn tất")
                Yêu cầu hoàn trả
                @else
                Hủy đơn hàng 
                @endif
            </a>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection