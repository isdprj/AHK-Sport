<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page">
        <div class="login-box">
        <div class="login-logo">
            <b>Trang quản trị hệ thống AHK-Sport</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập</p>
                @include('admin.alert')
                <form action="/admin/users/login/store" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
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
                            <button type="submit" class="btn-alter btn-primary btn-block">Đăng nhập</button>
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