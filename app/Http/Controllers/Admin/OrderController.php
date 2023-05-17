<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use mysqli;

class OrderController extends Controller
{


    public function index()
    {
        $bills = Bill::get()->sortByDesc('updated_at');
        $customers = DB::table('customers')
                        ->join('bills','bills.id_customer', '=', 'customers.id')
                        ->get();
        return view('admin.order.list', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'bills' => $bills,
            'customers' => $customers
        ]);
    }

    public function show($id)
    {  
        $title = 'Chi tiết đơn hàng';
        $bills = Bill::where('id',$id)->first();
        $detailProduct = DB::table('products')
                        ->join('bill_details','bill_details.id_product', '=', 'products.id')
                        ->where('bill_details.id_bill','=',$id)
                        ->get();
        $customers = DB::table('customers')
                        ->join('bills','bills.id_customer', '=', 'customers.id')
                        ->first();                
        $status = null;
        $conn =  new mysqli("localhost","root","","isd");
        if (isset($_GET['status']))
        {
            $sql = "UPDATE bills SET status = '$_GET[status]' WHERE id = $id";
            if ($conn->query($sql) === true){
                Session::flash('success', 'Cập nhật thành công');
                return redirect('/admin/orders/list');
            } else {
                Session::flash('error', 'Có lỗi vui lòng thử lại');
            }
        }

        return view('admin.order.detail', compact('detailProduct','customers','title','bills'));
    }
}