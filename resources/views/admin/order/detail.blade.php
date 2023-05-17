@extends('admin.main')

@section('content')
<table class="table">
    <thead>
    <tr>
        <th class="wd-200">Thông tin</th>
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
            <td>Tên khách hàng</td>
            <td>{{$customers->name}}</td>
        </tr>
        <tr>
            <td>Danh sách mặt hàng</td>
            <td>

                <table>
                    <thead>
                        <tr>
                            <th>Tên mặt hàng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($detailProduct as $dt)
                        <tr>
                            <td>{{$dt->name}}</td>
                            <td>
                                @if ($dt->promotion_price > 0)
                                {{number_format($dt->promotion_price)}}
                                @else
                                {{number_format($dt->unit_price)}} đ
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
            <td>{{$bills->total}}đ</td>
        </tr>
        <tr>
            <td>Ngày đặt</td>
            <td>{{date($bills->created_at)}}</td>
        </tr>
        <tr>
            <td>Phương thức thanh toán</td>
            @if ($bills->payment == 'bacs') 
            <td>Chuyển khoản trực tiếp</td>
            @endif
        </tr>
        <tr>
            <td>
                @if ($bills->status == "Hoàn tất")
                Lý do yêu cầu hoàn trả
                @else
                Ghi chú
                @endif
            </td>
            <td>{{$bills->note}}</td>
        </tr>
        <tr>
            
                <td>Tình trạng</td>
                <td>
                    <form action="/admin/orders/detail/{{$bills->id}}" method="PUT">
                        <select name="status">
                                <option value="{{$bills->status}}">{{$bills->status}}</option>
                                <option value="Đã tiếp nhận">Đã tiếp nhận</option>
                                <option value="Đang chuẩn bị hàng">Đang chuẩn bị hàng</option>
                                <option value="Đang đóng gói">Đang đóng gói</option>
                                <option value="Đang vận chuyển">Đang vận chuyển</option>
                                <option value="Hoàn tất">Hoàn tất</option>
                        </select>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </form>
                </td>
            
        </tr>
    </tbody>
</table>
@endsection