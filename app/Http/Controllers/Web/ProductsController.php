<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductOrderRepository;
use App\Repositories\ProductsRepository;

class ProductsController extends Controller
{
    private $productsRepository;
    public function __construct(ProductsRepository $productsRepository){
        $this->productsRepository=$productsRepository ;
    }
    public function showProducts(Request $request)
    {
        $products=$this->productsRepository->showProducts();
        return view('web.homepage.index', ['products' =>$products]);
    }
    public function viewProducts($id){
        $products=$this->productsRepository->showProducts();
        $viewProduct=$this->productsRepository->viewDetail($id);
        return view('web.product.show',['product'=>$viewProduct,'products'=>$products]);
    }
    
}
