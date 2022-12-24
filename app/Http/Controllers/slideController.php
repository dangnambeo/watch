<?php

namespace App\Http\Controllers;

use App\slide;
use Illuminate\Http\Request;

class slideController extends Controller
{
    public function listSlide(){
        $slide = slide::all();
        return view('admin.slide.list-slide',compact('slide'));
    }
    public function addSlide(){
        $slide = slide::all();
        return view('admin.slide.add-slide',compact('slide'));
    }
    public function postAddSlide(Request $request){
        $slide = new slide;
        $slide->title = $request->title;
        if ($slide->save()) {
            if ($request->hasFile('img_slide')) {
                $file = $request->img_slide;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/Slide', $file->getClientOriginalName());
                $slide->img_slide = "upload/Slide/" . $file->getClientOriginalName();
                $slide->save();
            }
        }
        alert()->toast('Thêm mới Slide thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('slide'));
    }
    public function editSlide($id){
        $slide = slide::findOrfail($id);
        return view('admin.slide.edit-slide',compact('slide'));
    }
    public function postEditSlide(Request $request,$id){
        $slide = slide::find($id);
        $slide->title = $request->title;
        if ($slide->save()) {
            if ($request->hasFile('img_slide')) {
                $file = $request->img_slide;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/Slide', $file->getClientOriginalName());
                $slide->img_slide = "upload/Slide/" . $file->getClientOriginalName();
                $slide->save();
            }
        }
        alert()->toast('Chỉnh sửa Slide thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('slide'));
    }
    public function delSlide($id){
        $slide = slide::find($id);
        $slide -> delete();
        alert()->toast('Xóa Slide thành công', 'error')->persistent(false)->autoClose(1200);
        return back();
    }
}
