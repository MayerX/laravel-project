<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Cloner\Data;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {

        $username = $request['username'];
        $password = $request['password'];

        $res = Auth::attempt(['username' => $username, 'password' => $password]);

        if (!$res){
            return Redirect::to('login')
                ->withErrors("412", "账号或密码错误");
        }
        else {
            $user = Auth::user();
            $request->session()->regenerate();
            $request->session()->put('type', $user['type']);
            // type:2 -> 医生
            // type:4 -> 患者
            if ($user['type'] == 2) {
//                return $request->session()->all();
                return Redirect::to('doctor');
            }
            elseif ($user['type'] == 4){
                return Redirect::to('patient');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('type');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('index');
    }
}
