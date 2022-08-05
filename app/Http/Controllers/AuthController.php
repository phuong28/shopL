<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;




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
    public function __construct(){
       
    }

    public function index()
    {
        return view('web.register.index');
    }
    public function store(RegisterRequest $request){
        $validated = $request->validated();
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
        return redirect()->to('/');
       
    } 
    
}
