<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=product::All();
        return view('admin.products.index', ['products'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::All();
        return view('admin.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=product::create([
            "catid"=>$request->input('selectCatid'),
            "productname"=>$request->input('inputProductname'),
            "image"=>$request->input('inputImage'),
            "detail"=>$request->input('inputDetail'),
            "price"=>$request->input('inputPrice'),
            "saleprice"=>$request->input('inputSaleprice'),
            "views"=>$request->input('inputViews'),
            "public"=>$request->input('radioPublic'),
            "created_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($product)
        {
            return redirect()->back()->with("message", "Thêm mới thành công");
        }
        return back()->withInput()->with("message", "Không thể thêm mới, có lỗi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product=product::find($product->productid);
        $categories=Category::all();
        return view('admin.products.edit',['categories'=>$categories,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $productUpdate=product::where('productid',$product->productid)
        ->update([
            "catid"=>$request->input('selectCatid'),
            "productname"=>$request->input('inputProductname'),
            "image"=>$request->input('inputImage'),
            "detail"=>$request->input('inputDetail'),
            "price"=>$request->input('inputPrice'),
            "saleprice"=>$request->input('inputSaleprice'),
            "views"=>$request->input('inputViews'),
            "public"=>$request->input('radioPublic'),
            "updated_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
// Màu đỏ là tên các cột trong bảng categories của CSDL
// Màu xanh là giá trị thuộc tính name của các input trong form
//Nếu thêm mới thành công thì quay lại form thêm gửi kèm theo thông báo
        if ($productUpdate)
        {
            return redirect()->back()->with("message", "Cập nhật thành công ");
        }
        return back()->withInput()->with("message", "Không thể cập nhật, có lỗi ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->delete())
        {
            return redirect()->route('products.index')->with('message', 'product
                deleted successfully');     
        }
        return redirect()->route('products.index')->with('message','product deleted
            error');
    }
}
