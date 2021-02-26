<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Slide;
use App\Cart;
use App\User;
use App\Contact;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Post;
use App\Introduce;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        $new_product=Product::where('views',1)->orderBy('created_at', 'DESC')->oldest()->paginate(4);
        $sale_product=Product::where('saleprice','<>',0)->paginate(12);
        return view('home.index',compact('slide','new_product','sale_product'));
    }

    /**
     * getLoaiSp the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getLoaiSp($catid)
    {
        $sp_theoloai = Product::where('catid',$catid)->get();
        $sp_khac = Product::where('catid','<>',$catid)->paginate(3);
        $loai = Category::all();
        $loai_sp = Category::where('catid',$catid)->first();
        return view('home.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    /**
     * getChitiet the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getChitiet(Request $req)
    {
        $sanpham=Product::where('productid',$req->productid)->first();
        $sp_tuongtu = Product::where('catid',$sanpham->catid)->paginate(3);
        return view('home.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }

    /**
     * getGioiThieu the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getGioiThieu()
    {
        $introdures = Introduce::All();
        return view('home.gioithieu',compact('introdures'));
    }

    /**
     * getTinTuc the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getTinTuc()
    {
        $posts = Post::first()->paginate(5);
        return view('home.tintuc',compact('posts'));
    }

    /**
     * getLienHe the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getLienHe()
    {
        return view('home.lienhe');
    }

    /**
     * postLienHe the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function postLienHe(Request $req)
    {
        $this->validate($req,
            [
                'fullname'=>'required',
                'email'=>'required|email',
                'phone'=>'required', 
                'detail'=>'required'
            ],
            [
                'fullname.required'=>'Vui lòng nhập tên',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'phone.required'=>'Vui lòng nhập điện thoại',
                'detail.required'=>'Vui lòng nhập nội dung'
            ]);
        $contact = new Contact();
        $contact->fullname = $req->fullname;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->detail = $req->detail;
        $contact->save();
        return redirect()->back()->with('thanhcong','Liên hệ thành công');
    }

    /**
     * getAddtoCart the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getAddtoCart(Request $req,$productid)
    {
        if(Auth::user()) {
            $product = Product::find($productid);
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product,$productid);
            $req->session()->put('cart',$cart);
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    /**
     * getDeletetoCart the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getDeletetoCart($productid)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($productid);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    /**
     * getCheckout the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getCheckout() {
        return view('home.dat_hang');
    }

    /**
     * postCheckout the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->customername = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill =  new Bill;
        
        $bill->customerid = $customer->customerid;
        $bill->total = $cart->total;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->billid =  $bill->billid;
            $bill_detail->productid = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->saleprice = ($value['saleprice']/$value['qty']);
            $bill_detail->price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');  
    }
    /**
     * getSearch the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
    */
    public function getSearch(Request $req)
    {
        $keyWord = $req->key;
        $product = Product::where('productname','like','%'.$keyWord.'%')->orWhere('price',$keyWord)->get();
        return view('home.search',compact('product', 'keyWord'));
    }
}