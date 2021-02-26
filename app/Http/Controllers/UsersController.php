<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index() 
    {
        $u = User::All();
        return view('admin.users.index',['users'=> $u]);
    }

    public function create() 
    {
        $u = User::All();
        return view('admin.users.create',['users'=> $u]);
    }

    public function store(Request $request)
    {
        $confirmpass = $request->input('inputConfirmPassword');
        $password = $request->input('inputPassword');
        if($confirmpass != $password) {
            return redirect()->back()->with("message", "Mật khẩu không khớp");
        } else {
            $password = Hash::make($password);
        }
        $user= User::create([
            "name"=>$request->input('inputUsername'),
            "email"=>$request->input('inputEmail'),
            "password"=>$password,
            "access"=>$request->input('inputAccess'),
            "created_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        
        if($user)
        {
            return redirect()->back()->with("message", "Thêm mới thành công");
        }
        else {
             return back()->withInput()->with("message", "Không thể thêm mới, có lỗi");
        }
    }

    public function edit(User $user) 
    {
        $user = User::find($user->id);
        return view('admin.users.edit',['user'=> $user]);
    }

    public function update(Request $request, User $user)
    {
        $confirmpass =$request->input('inputConfirmPassword');
        $password = $request->input('inputPassword');
        if($confirmpass != $password) {
            return redirect()->back()->with("message", "Mật khẩu không khớp");
        } else {
            $password = Hash::make($password);
        }
        $userUpdate = user::where('id', $user->id)
        ->update([
            "name"=>$request->input('inputUsername'),
            "email"=>$request->input('inputEmail'),
            "password"=>$password,
            "access"=>$request->input('inputAccess'),
            "updated_at"=>Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        if ($userUpdate)
        {
            return redirect()->back()->with("message", "Cập nhật thành công ");
        }
        return back()->withInput()->with("message", "Không thể cập nhật, có lỗi");
    }

    public function destroy(User $user)
    {
        if($user->delete())
        {
            return redirect()->route('users.index')->with("message", "Xóa thành công");
        }
        return back()->withInput()->with("message","Không thể xóa, có lỗi");
    }

    public function getLoginAdmin()
    {
        $user = new User;
        if(Auth::check($user)) {
            return redirect()->route('products.index');
        }
        return view('admin.login');
    }

    public function postLoginAdmin(Request $req)
    {
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
        {
            return redirect()->route('products.index')->with('message','Đăng nhập thành công');
        } else {
            return redirect('admin')->with('message','Đăng nhập thất bại');
        }
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin');
    }
}
