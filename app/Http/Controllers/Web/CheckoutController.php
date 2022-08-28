<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;






class CheckoutController extends Controller
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
    
    

    public function index()
    {
        $cart=session()->get('cart',[]);
        return view('web.checkout.index',['cartItems' => $cart]);
    }
    
    
}
