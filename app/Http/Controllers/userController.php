<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;

class userController extends Controller
{
    public function listUser(){
        $user = User::all();
        $this->authorize($user);
        return view('admin.user.list-user',compact('user'));
    }
    public function getAddUser(){
        $user = User::all();
        return view('admin.user.add-user');
    }
    public function postAddUser(Request $request){
        $eror1 = [
            'full_name.required' => 'Bạn chưa nhập tên người dùng',
            'user_name.required' => 'Bạn chưa nhập tên đăng nhập',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password2.required' => 'Bạn chưa nhập lại mật khẩu ',
            'password2.same' => 'Mật Khẩu nhập lại không khớp ',
        ];
        $this->validate($request, [
            "full_name" => "required",
            "user_name" => "required",
            "password" => "required",
            "password2" => "required|same:password"
        ], $eror1);
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_name = $request->user_name;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);

        if ($user->save()) {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/avatar', $file->getClientOriginalName());
                $user->avatar = "upload/avatar/" . $file->getClientOriginalName();
                $user->save();
            }
        }
        alert()->toast('Tạo tài khoản thành công thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-user'));
    }
    public function getEditUser($id){
        $user = User::findOrfail($id);
        $this->authorize($user);
        return view('admin.user.edit-user',compact('user'));
    }
    public function postEditUser(Request $request, $id){
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
      //  $user->user_name = $request->user_name;
        $user->role_id = $request->role_id;
        if ($request->checkbox3 == "on") {
            $this->validate($request, [
                "password" => "required",
                "password2" => "required|same:password"
            ]);
            $user->password = bcrypt($request->password);
        }
        if ($user->save()) {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/avatar', $file->getClientOriginalName());
                $user->avatar = "upload/avatar/" . $file->getClientOriginalName();
                $user->save();
            }
        }
        return redirect(route('list-user'));
    }
    public function DelUser($id){
        $user = User::find($id);
        $user->delete();
        $this->authorize($user);
        return back();
    }
    public function getLogin()
    {
        if (Auth::guard()->check()) {
            return redirect(\route('dashboard'));
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(Request $request){
        $user_name = $request ->user_name;
        $password = $request ->password;
        // $passwordword = $request ->passwordword;

        if (Auth::attempt(['user_name'=>$user_name,'password'=>$password])){
            alert()->toast('Đăng nhập thành công', 'success')->persistent(false)->autoClose(1200);
            return redirect(route('dashboard'));
        } else{
            alert()->toast('Bạn đã nhập sai tên đăng nhập hoặc mật khẩu', 'error')->persistent(false)->autoClose(5000);
            return back();
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
