<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    public function viewLogin()
    {
        return view('web.login.index');
    }
    public function login(LoginRequest $request)
    {
        $request->validated();
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']],$request->remember_me)) {
            // Success
            return redirect('/');
        }
        else {
            // Go back on error (or do what you want)
            $this->sendFailedLoginResponse($request);
        }
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->email)->first();
        if ($user && !Hash::check($user->password, $request->password)) {
            $validator = Validator::make([], []);
            $validator->errors()->add('password', __('Mật khẩu không chính xác.'));
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        return redirect('/login');
    }
}
