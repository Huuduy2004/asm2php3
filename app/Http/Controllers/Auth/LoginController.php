<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // login
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only(['username', 'password']);
        // kiểm tra tk có trong csdl ko
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('message', 'Đăng nhập thành công');
        } else {
            if ($request['username'] == "" || $request['password'] == "") {
                return redirect()->back()->with('errorLogin', 'Không được bỏ trống');
            } else {
                return redirect()->back()->with('errorLogin', 'Username hoặc password không tồn tại');
            }
        }
    }
    // Register
    public function register()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'fullname.required' =>'Không được bỏ trống fullname',
                'username.required' =>'Không được bỏ trống username',
                'email.required' =>'Không được bỏ trống email',
                'password.required' =>'Không được bỏ trống password',
            ]
        );
        $data = $request->all();
        User::query()->create($data);

        return redirect()->back()->with('message', 'Đăng kí tài khoản thành công');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
