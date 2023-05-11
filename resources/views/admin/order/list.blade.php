@extends('admin.main')

@section('content')
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 100px">Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th>Chi tiết</th>
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
                <span class="btn btn-success btn-xs">Hoàn tất</span>
                @endif  
                <span class="btn btn-danger btn-xs">{{$bill->status}}</span>
                </td>
                <td> <a href="/admin/orders/detail/{{$bill->id}}">Chi tiet</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
    </div>
@endsection

