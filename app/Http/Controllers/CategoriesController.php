<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=category::All();
        return view('admin.categories.index', ['categories'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('parent', 0)->get();
        return view('admin.categories.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=category::create([
            "catname"=>$request->input('inputCatname'),
            "parent"=>$request->input('selectParent'),
            "orderitem"=>$request->input('inputOrderItem'),
            "public"=>$request->input('radioPublic'),
            "haschild"=>$request->input('radioHasChild'),
            "created_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($category)
        {
            return redirect()->back()->with("message", "Thêm mới thành công");
        }
        return back()->withInput()->with("message", "Không thể thêm mới, có lỗi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->catid);
        return view('admin.categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoryUpdate=category::where('catid', $category->catid)
        ->update([
            "catname"=>$request->input('inputCatname'),
            "parent"=>$request->input('selectParent'),
            "haschild"=>$request->input('radioHasChild'),
            "orderitem"=>$request->input('inputOrderItem'),
            "public"=>$request->input('radioPublic'),
            "updated_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
// Màu đỏ là tên các cột trong bảng categories của CSDL
// Màu xanh là giá trị thuộc tính name của các input trong form
//Nếu thêm mới thành công thì quay lại form thêm gửi kèm theo thông báo
        if ( $categoryUpdate)
        {
            return redirect()->back()->with("message", "Cập nhật thành công ");
        }
        return back()->withInput()->with("message", "Không thể cập nhật, có lỗi ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete())
        {
            return redirect()->route('categories.index')->with('message', 'Category
                deleted successfully');
        }
        return redirect()->route('categories.index')->with('message','Category deleted
            error');
    }
}