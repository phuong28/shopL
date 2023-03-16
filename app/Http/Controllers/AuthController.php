<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private $user;

    private $key = 'user';
    public function __construct()
    {

    }

    public function index()
    {
        return view('web.register.index');
    }
    public function viewLogin()
    {
        return view('web.login.index');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        //auth()->login($user);
        return redirect()->to('/login');

    }
    public function login(LoginRequest $request)
    {
        $request->validated();
        $data = $request->all();
       
        
       // return redirect("login");
       if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])) {
        // Success
        return redirect('/');
    } else {
        // Go back on error (or do what you want)
        return redirect('/login');
    }
    }

    public function signOut()
    {
        // Session::flush();
        // Auth::logout();

        return Redirect('login');
    }


}