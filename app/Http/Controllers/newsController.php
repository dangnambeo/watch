<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function listNew(){
        $new = news::all();
        return view('admin.news.list-news',compact('new'));
    }
    public function getAddNew(){
        return view('admin.news.add-news');
    }
    public function postAddNew(Request $request){
        $new = new news;
        $new->title = $request->title;
        $new->summary = $request->summary;
        $new->content_news = $request->content_news;
        if ($new->save()) {
            if ($request->hasFile('img')) {
                $file = $request->img;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/news', $file->getClientOriginalName());
                $new->img = "upload/news/" . $file->getClientOriginalName();
                $new->save();
            }
        }
        alert()->toast('Thêm mới bài viết thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-new'));
    }
    public function getEditNew($id){
        $new = news::findOrfail($id);
        return view('admin.news.edit-news',compact('new'));
    }
    public function postEditNew($id,Request $request){
        $new = news::find($id);
        $new->title = $request->title;
        $new->summary = $request->summary;
        $new->content_news = $request->content_news;
        if ($new->save()) {
            if ($request->hasFile('img')) {
                $file = $request->img;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/news', $file->getClientOriginalName());
                $new->img = "upload/news/" . $file->getClientOriginalName();
                $new->save();
            }
        }
        alert()->toast('Sửa bài viết thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-new'));
    }
    public function delNew($id){
        $new = news::find($id);
        $new ->delete();
        alert()->toast('Xóa ài viết thành công', 'error')->persistent(false)->autoClose(1200);
        return back();
    }

}
