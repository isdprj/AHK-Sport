<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page">
        <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập</p>
                @include('admin.alert')
                <form action="/admin/users/login/store" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="full_name" class="form-control" placeholder="Tên người dùng">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>