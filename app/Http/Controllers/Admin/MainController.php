<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
           'title' => 'Trang Quản Trị Admin'
        ]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect('adminlogin')->with('logoutMessage', 'Đăng xuất thành công!');
    }
}