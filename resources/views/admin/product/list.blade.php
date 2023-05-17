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
            <th style="width: 10px">ID</th>
            <th style="width: 80px">Tên Sản Phẩm</th>
            <th style="width: 50px">Loại</th>
            <th>Giá Gốc</th>
            <th style="width: 108px">Khuyến Mãi</th>
            <th>Mô tả</th>
            <th>Thông số</th>
            <th>Đơn vị</th>
            <th>Số lượng</th>
            <th style="width: 100px">Cập nhập</th>
            <th>Tùy chỉnh</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td >{{ $product->name }}</td>
                <td>{{ $product->id_category }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>{{ $product->promotion_price }}</td>
                <td style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;max-width:250px;">{{$product->description}}</td>
                <td style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;max-width:250px">{{$product->stats}}</td>
                <td>{{$product->unit}}</td>
                <td>{{$product->quantity}}</td>
                {{-- <td>{!! \App\Helpers\Helper::active($product->active) !!}</td> --}}
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {{-- {!! $products->links() !!} --}}
    </div>
@endsection

