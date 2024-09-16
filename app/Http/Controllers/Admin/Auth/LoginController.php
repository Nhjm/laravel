<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    const PATH_VIEW = 'admin.auth.';
    public function login_form()
    {
        return view(self::PATH_VIEW . 'login');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        // dd($remember);

        if (Auth::attempt($data, $remember)) {
            return redirect()->route('admin.index');
        } else {
            return back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login.form')->with('success', 'đăng xuất thành công');
    }
}
