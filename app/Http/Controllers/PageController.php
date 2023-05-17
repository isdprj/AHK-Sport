<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Slider;
use App\Models\User;
use App\Models\Product;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Favourite;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysqli;



class PageController extends Controller
{
    public function getIndex(){
        $slider = Slider::all();
        $newProduct = Product::get()->sortByDesc('updated_at')->take(4);
        $saleProduct = Product::where('promotion_price','<>',0)->paginate(4);
        
        return view('page.home',compact('slider','newProduct','saleProduct'));
    }

    public function getProductCategory($type){
        $productType1 = ProductCategory::get()->sortBy('id')->take(5);
        $productType2 = ProductCategory::get()->sortByDesc('id')->take(5);
        $productOfType = Product::where('id_category',$type)->get();
        return view('page.product_categories', compact('productOfType','productType1','productType2'));
    }

    public function getProductShoes(){
        $productType1 = ProductCategory::get()->sortBy('id')->take(5);
        $productType2 = ProductCategory::get()->sortByDesc('id')->take(5);
        $productShoes = Product::where('id_category','<=',5)->get();
        return view('page.shoes', compact('productShoes','productType1','productType2'));
    }
    public function getProductUltility(){
        $productType1 = ProductCategory::get()->sortBy('id')->take(5);
        $productType2 = ProductCategory::get()->sortByDesc('id')->take(5);
        $productUltility = Product::where('id_category','>',5)->get();
        return view('page.ultility', compact('productUltility','productType1','productType2'));
    }

    public function getProduct(Request $req){
        $product = Product::where('id',$req->id)->first();
        $relatedProduct = Product::where('id_category',$product->id_category)->paginate(3);
        $productVariation = DB::table('product_variations')
                            ->join('products','product_variations.id_product', '=', 'products.id')
                            ->get();
        return view('page.product',compact('product','relatedProduct','productVariation'));
    }

    public function addCart(Request $req ,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function delCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }
    public function getLogin(){
        return view('page.login');
    }
    public function getRegister(){
        return view('page.register');
    } 

    public function postRegister(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:users,email',
            'fullname'=>'required',
            'password'=>'required|min:8',
            're_password' => 'required|same:password'
        ],[
            'email.required'=> 'Vui lòng nhập Email của bạn',
            'email.email' => 'Bạn đã nhập sai định dạng Email. Vui lòng nhập lại Email!',
            'email.unique' => 'Tài khoản với Email này đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu mong muốn',
            're_password.same' => 'Bạn đã nhập mật khẩu không khớp. Vui lòng nhập lại Mật khẩu!',
            'password.min'=> 'Mật khẩu của bạn phải có 8 ký tự trở lên!'
        ]
    );
        $user = new User();
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone;
        $user->address = $request->address;
        $user->is_admin = false;
        $user->save();
        return redirect()->route('login')->with('echo', 'Tài khoản của bạn đã được tạo thành công! Hãy đăng nhập ngay');
    }
    public function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=> 'required|email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Vui lòng nhập Email của bạn',
            'email.email' => 'Bạn đã nhập sai định dạng Email. Vui lòng nhập lại Email!',
            'password.required' => 'Vui lòng nhập Mật khẩu mong muốn'
            
        ]);
        $credentials = array('email' => $request->email,
                             'password'=> $request->password);
        if(Auth::attempt($credentials)){
            return redirect('index')->with(['flag' => 'success','message' => 'Bạn đã đăng nhập thành công!']);
        }
        else{
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Bạn đã nhập sai mật khẩu hoặc email!']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('index')->with('logoutMessage', 'Bạn đã đăng xuất thành công!');
    }
    public function like($pid){
        if(Auth::check()){
            $uid = Auth::user()->id;
        }
        if(!Favourite::where(['id_product'=>$pid,'id_user'=>$uid])->exists()){
            Favourite::create(['id_product'=>$pid,'id_user'=>$uid]);
        }
        session()->put('liked.'.$pid, true);
        return redirect()->back();
    }

    public function unlike($pid){
        if(Auth::check()){
            $uid = Auth::user()->id;
        }
        if(Favourite::where(['id_product'=>$pid,'id_user'=>$uid])->exists()){
            Favourite::where(['id_product'=>$pid,'id_user'=>$uid])->delete();
        }
        session()->forget('liked.'.$pid);
        return redirect()->back();
    }
    public function getFavourite(){
        $id = Auth::id();
        $favouriteProduct = DB::table('favourites')
                            ->join('products','favourites.id_product', '=', 'products.id')
                            ->join('users', 'favourites.id_user', '=', 'users.id')
                            ->where('id_user',$id)
                            ->get();
        return view('page.favourite',compact('favouriteProduct'));
    }

    public function getSearch(Request $req){
        $productType1 = ProductCategory::get()->sortBy('id')->take(5);
        $productType2 = ProductCategory::get()->sortByDesc('id')->take(5);
        $productSearch = Product::where('name', 'like', '%'.$req->key.'%')
                            -> orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search',compact('productSearch','productType1','productType2'));
    }

    public function getCheckout(){
        $user = Auth::user();
        
        return view('page.checkout',compact('user'));
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->id_user = Auth::id();
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_oreder = date('Y-m-d');
        $bill->total = $cart->totalPrc;
        $bill->payment = $req->payment;
        $bill->note = $req->notes . ". Kích thước: ". $req->size;
        $bill->status = 'Đang xử lí';
        $bill->id_user = Auth::id();
        $bill->save();

        foreach($cart->items as $key=>$value){
            
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect('order')->with('anno', 'Đặt hàng thành công');
    }

    public function getAccount(){
        $id = Auth::id();
        $user = Auth::user();
        $conn =  new mysqli("localhost","root","","isd");
        if (isset($_GET['full_name'])&&isset($_GET['email'])&&isset($_GET['phone_number'])&&isset($_GET['address']))
        {
            $sql = "UPDATE users 
                    SET full_name = '$_GET[full_name]' ,
                        email = '$_GET[email]',
                        phone_number = '$_GET[phone_number]',
                        address = '$_GET[address]'
                    WHERE id = $id";
            if ($conn->query($sql) === true){
                Session::flash('success', 'Cập nhật thành công');
                return redirect()->back();
            } else {
                Session::flash('error', 'Có lỗi vui lòng thử lại');
                return redirect()->back();
            }
        }
        return view('page.account',compact('user','id'));
    }
    public function postAccount(Request $req, User $user){
        $id = Auth::id();
        $user = User::get($id);
        try{
            $user->fillAndSave($req->only('name','email','address','phone_number'));
            Session::flash('success', 'Cập nhật thành công');

        }
        catch (Exception $e){
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($e->getMessage());
        }
    }

    public function getOrder(){
        $id = Auth::id();
        $bills = DB::table('bills')->where('id_user',$id)->get();
        $detailProduct = DB::table('products')
                        ->join('bill_details','bill_details.id_product', '=', 'products.id')
                        ->join('bills','bill_details.id_bill','=','bills.id')
                        ->where('bills.id_user',$id)
                        ->get();
        return view('page.order',compact('bills','detailProduct'));

    }
    public function getCancel($id){
        $bills = DB::table('bills')->where('id',$id)->first();
        $conn =  new mysqli("localhost","root","","isd");
        if (isset($_GET['note']))
        {
            $sql = "UPDATE bills 
                    SET note = '$_GET[note]' , status = 'Đã hủy đơn' 
                    WHERE id = $id";
            if ($conn->query($sql) === true){
                Session::flash('success', 'Xác nhận thành công');
                return redirect('order');
            } else {
                Session::flash('error', 'Có lỗi');
                return redirect()->back();
            }
        }
        return view('page.cancel',compact('bills'));
    }

    public function getDetail($id){
        $bills = Bill::where('id',$id)->first();
        $detailProduct = DB::table('products')
                        ->join('bill_details','bill_details.id_product', '=', 'products.id')
                        ->where('bill_details.id_bill','=',$id)
                        ->get();
        return view('page.detail',compact('bills','detailProduct'));
    }
}

