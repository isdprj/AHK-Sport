<?php


namespace App\Http\Services\Product;


use Exception;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{

    public function insert($request)
    {
        try {
            $request->except('_token');
            Product::create([
                'name' => $request->input('name'),
                'id_category' => $request->input('id_category'),
                'unit_price' => $request->input('unit_price'),
                'promotion_price' => $request->input('promotion_price'),
                'description' => $request->input('description'),
                'stats' => $request->input('stats'),
                'unit' => $request->input('unit'),
                'quantity' => $request->input('quantity'),
                'image' => $request->input('image')
            ]);

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::get()->sortBy('id');
    }

    public function update($request, $product)
    {

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}