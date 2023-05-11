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
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>
                <th>Đổi</th>   
                </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->full_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->address}}</td>
                <td>{!! \App\Helpers\Helper::isAdmin($user->is_admin) !!}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td> 
            </tr>
                @endforeach
        </tbody>
    </table>

    
@endsection