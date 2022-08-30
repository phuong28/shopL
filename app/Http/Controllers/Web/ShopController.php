<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;
use App\Repositories\ProductsRepository;
use Symfony\Component\HttpFoundation\Request;






class ShopController extends Controller
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
    private $productsRepository;
    
    public function __construct(ProductsRepository $productsRepository){
        $this->productsRepository=$productsRepository ;
    }
    public function index(Request $request)
    {
        $listProducts=$this->productsRepository->getAllProducts();
        $productPaginate=$this->productsRepository->showShop();
        return view('web.shop.index',['products'=>$listProducts,'paginate'=>$productPaginate]);
    }
}
