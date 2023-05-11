@extends('admin.main')

@section('content')
<table class="table">
    <thead>
    <tr>
        <th style="width: 200px">Thông tin</th>
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
                            <th>Giá gốc</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($detailProduct as $dt)
                        <tr>
                            <td>{{$dt->name}}</td>
                            @if ($dt->promotion_price > 0)
                                <td>{{number_format($dt->promotion_price)}}</td>
                            @endif
                            <td>{{number_format($dt->unit_price)}} đ</td>
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
            @if ($bills->payment = 'bacs') 
            <td>Chuyển khoản trực tiếp</td>
            @endif
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
                        <button type="submit">Lưu</button>
                    </form>
                </td>
            
        </tr>
    </tbody>
</table>
@endsection