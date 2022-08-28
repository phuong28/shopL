<?php
namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\ProductsRepository;
use App\Models\Cart;
class CartController extends Controller
{
    private $productRepository;
    public function __construct(ProductsRepository $productsRepository){
        $this->productRepository= $productsRepository;
    }

    public function index()
    {
        if (Auth::check()) {
            $cart= session()->get('cart',[]);
            return view('web.cart.index',['cartItems' => $cart]);
        }
        else{
            return redirect('login');
        }

    }
    public function add($id)
    {
        if (Auth::check()) {
            $product = $this->productRepository->findId($id);
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            }
            else {
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "images" => $product->images
                ];
            }
            session()->put('cart', $cart);
            return redirect('/cart');
        }
        else{
            return redirect('login');
        }
    }
    public function modify(Request $request,$id)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect('/cart');
        }
    }
    public function delete(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect("/cart");
        }
    }
}

?>