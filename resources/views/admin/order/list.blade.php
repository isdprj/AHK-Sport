@extends('admin.main')

@section('content')
        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}
    <table class="table">
        <thead>
        <tr>
            <th style="width: 100px">Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th>Xem chi tiết</th>
            <th>Chỉnh sửa lần cuối</th>
            {{-- <th>Trạng thái thanh toán</th> --}}
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bills as $key => $bill)
            <tr>
                <td>{{ $bill->id }}</td>
                <td>{{ $bill->date_oreder }}</td>
                <td>
                @if ($bill->status == "Hoàn tất")
                <span class="btn btn-success btn-xs">{{$bill->status}}</span>
                @else
                <span class="btn btn-danger btn-xs">{{$bill->status}}</span>
                @endif  
                </td>
                <td> <a href="/admin/orders/detail/{{$bill->id}}">Chi tiết</a></td>
                <td>{{$bill->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
    </div>
@endsection

