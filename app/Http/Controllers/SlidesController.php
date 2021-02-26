<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c=slide::All();
        return view('admin.slides.index', ['slides'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slides=Slide::All();
        return view('admin.slides.create',['slides'=>$slides]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = Slide::create([
            "slidename"=>$request->input('inputSlidename'),
            "link"=>$request->input('inputLink'),
            "image"=>$request->input('inputImage'),
            "created_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($slide)
        {
            return redirect()->back()->with("message", "Thêm mới thành công");
        }
        return back()->withInput()->with("message", "Không thể thêm mới, có lỗi");
    }

    /**
     * Edit the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(slide $slide)
    {
        $slide=slide::find($slide->slideid);
        return view('admin.slides.edit', ['slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slide $slide)
    {
        $slidesUpdate=slide::where('slideid',$slide->slideid)
        ->update([
            "slidename"=>$request->input('inputSlidename'),
            "link"=>$request->input('inputLink'),
            "image"=>$request->input('inputImage'),
            "updated_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($slidesUpdate)
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
    public function destroy(slide $slide)
    {
        if($slide->delete())
        {
            return redirect()->route('slides.index')->with('message', 'Xóa thành công');     
        }
        return redirect()->route('slides.index')->with('message','Không thể xóa, có lỗi');
    }
}
