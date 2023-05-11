@extends('admin.main')

@section('content')
    <form action="" method="PUT">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên</label>
                        <input type="text" name="full_name" value="{{ $user->full_name}}" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vai trò</label>
                        <select class="form-control" name="is_admin">
                                <option value="{{$user->is_admin}}">{!! $user->is_admin == 0? "User" : "Admin"  !!}</option>
                                <option value="{{!$user->is_admin}}">{!! !$user->is_admin == 0? "User" : "Admin"  !!}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số điện thoại</label>
                        <input type="number" name="phone_number" value="{{ $user->phone_number}}"  class="form-control" disabled >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Địa chỉ</label>
                        <input type="text" name="address" value="{{ $user->address}}"  class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
        @csrf
    </form>
@endsection

