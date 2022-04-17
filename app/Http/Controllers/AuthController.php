<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }
    public function index()
    {
        return view('pages.auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang '. Auth::guard('web')->user()->name,
                'callback' => 'student',
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada kesalahan, harap coba kembali.',
            ]);
        }
    }
    public function do_logout()
    {
        $employee = Auth::guard('web')->user();
        Auth::logout($employee);
        return redirect()->route('office.auth.index');
    }
}
