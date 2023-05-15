<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use mysqli;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
        $title = 'Danh sách thông tin người dùng';
        $users = User::get()->sortBy('id');
        return view('admin.user.list',compact('users','title'));
    }

    public function show($id){
        $title = 'Chỉnh sửa thông tin người dùng';
        $user = DB::table('users')->where('id',$id)->first();
        $conn =  new mysqli("localhost","root","","isd");
        if (isset($_GET['is_admin']))
        {
            $sql = "UPDATE users 
                    SET is_admin = '$_GET[is_admin]'
                    WHERE id = $id";
            if ($conn->query($sql) === true){
                Session::flash('success', 'Cập nhật thành công');
                return redirect('/admin/users/list');
            } else {
                Session::flash('error', 'Có lỗi vui lòng thử lại');
                return redirect()->back();
            }
        }
        return view('admin.user.edit', compact('user','title'));
    }
}

