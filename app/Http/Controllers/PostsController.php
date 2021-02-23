<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::All();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::All();
        return view('admin.posts.create',['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title'=>$request->input('inputTitle'),
            'content'=>$request->input('inputContent'),
            'image'=>$request->input('inputImage'),
            "created_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if($post) {
            return redirect()->back()->with('message','Thêm thành công');
        }
        return redirect()->back()->with('message','Thêm thất bại,có lỗi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $posts = Post::find($post->postid);
        return view('admin.posts.edit',['posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $postupdate = Post::where('postid',$post->postid)->update([
            'title'=>$request->input('inputTitle'), 
            'content'=>$request->input('inputContent'),
            'image'=>$request->input('inputImage'), 
            'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if($postupdate) {
            return redirect()->back()->with('message','Cập nhật thành công');
        }
        return redirect()->back()->with('message','Cập nhật thất bại có lỗi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()) {
            return redirect()->route('posts.index')->with('message','Xóa thành công');
        }
        return redirect()->route('posts.index')->with('message','Không xóa được có lỗi');
    }
}
