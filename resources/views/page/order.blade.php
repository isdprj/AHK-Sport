@extends('base')
@section('content')
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
            <td>{{$bill->status}}</td>
            <td><button onclick="removeRow({{$bills->id}},)" class="btn btn-danger">Hủy</button></td>
            @endforeach      
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection