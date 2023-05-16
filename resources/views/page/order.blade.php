@extends('base')
@section('content')
@if (count($bills) == 0)
    <div class="text-center">Bạn chưa có đơn hàng nào</div>
@else
<table class="table">
    <thead>
        <tr>
            <th style="width: 100px">Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Mặt hàng</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tình trạng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bills as $bill)
        <tr>
            <td>{{ $bill->id }}</td>
            <td>{{date($bill->date_oreder)}}</td>
            @foreach ($detailProduct as $dt)
            <td>{{$dt->name}}</td>
            <td>
                @if ($dt->promotion_price > 0)
                {{number_format($dt->promotion_price)}}đ
                @else
                {{number_format($dt->unit_price)}}đ
                @endif
            </td>
            <td>{{$dt->quantity}}</td>
            @endforeach
            <td>{{$bill->status}}</td>
            <td>
            @if($bill->status != "Đã hủy đơn")    
                <a href="{{route('cancel',$bill->id)}}" class="btn btn-danger">
               @if ($bill->status == "Hoàn tất")
                Yêu cầu hoàn trả
               @endif
                Hủy đơn hàng 
            </a>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection