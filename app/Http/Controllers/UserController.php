<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
 
        User::create($validateData);

        return redirect('/')->with('success', 'Berhasil Mendaftar');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                $request->session()->regenerate();
                Session::put('user_id', $user->id);
                $name = $user->username;
                return redirect()->intended('/pemesanan');
            } else {
                $request->session()->flash('loginError', 'Login Failed!');
                return back();
            }
        }

        $request->session()->flash('loginError', 'Login Failed!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validate = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'content' => 'validasi error',
            ];
            return response()->json($respon, 404);
        } else {
            $user = User::where('email', $request->email)->first();
            if (! Hash::check($request->password, $user->password)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Password Salah',
                    'content' => 'Password',
                ];
                return response()->json($respon, 404);
            }

            if (!$token = JWTAuth::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Token Tidak Dapat Dibuat',
                ];
                return response()->json($respon, 404);
            }
            $respon = [
                'status' => 'success',
                'msg' => 'Login successfully',
                'content' => [
                    'status_code' => 200,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]
            ];
            return response()->json($respon, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}