<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'full_name' => $request->input('full_name'),
                'password' => $request->input('password')
            ])) {

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}