<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use Symfony\Component\HttpFoundation\Request;
class OrderController extends Controller{
    public function create(Request $request)
    {
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $cartItem) 
        {
            $total += $cartItem['price'] * $cartItem['quantity'];
        }
        $order = new Order();
        // $_POST['order_id'] = "". $currentDate->format('YmdHis')
        $data=$request->all();
        $data['subtotal']=$total;
        $data['users_id'] = Auth::user()->id;
        
        //protected $fillable = ['order_id','name','phone_number','address_street','address','subtotal','payment','users_id'];
        $order=Order::create([
            'name' => $data['name'],
            'phone_number'=>$data['phone_number'],
            'address_street'=>$data['address_street'],
            'address'=>$data['address'],
            'subtotal'=>$data['subtotal'],
            'payment'=>$data['payment'],
            'users_id'=>$data['users_id']
        ]);
        $orderDetail = new OrderDetail();
        $dataset=[];
        foreach($cart as $productId=>$cartItem){
            $dataset['product_id']=$productId;
            $dataset['order_id']=$order['id'];
            $dataset['quantity']=$cartItem['quantity'];
            $dataset['product_name']=$cartItem['name'];
            // $dataset['product_size']=$cartItem['size'];
            $dataset['total']=$cartItem['price']*$cartItem['quantity'];
        }
        
        $orderDetail= OrderDetail::create([
            'order_id'=>$dataset['order_id'],
            'product_id'=>$dataset['product_id'],
            'quantity'=>$dataset['quantity'],
            'product_name'=>$dataset['product_name'],
            'total'=>$dataset['total']
        ]);
        return view('web.order.success',['cartItems' => $cart]);
    }
    
    
    public function success()
    {
        return $this->view('order/success.php');
    }
    public function back(Request $request){
        $cart = session()->get('cart');
        $request->session()->forget('cart');
        return redirect('');
    }
}