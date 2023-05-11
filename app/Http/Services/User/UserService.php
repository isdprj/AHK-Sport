<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService{
    public function update($request, $user)
    {       
        try {
            $user->fill($request->only('is_admin'));
            $user->update();
            Session::flash('success', 'Cập nhật thành công');
        } catch (Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}