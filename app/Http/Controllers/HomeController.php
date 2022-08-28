<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;

class HomeController extends Controller
{
    private $productsRepository;
    
    public function __construct(ProductsRepository $productsRepository){
        $this->productsRepository=$productsRepository ;
    }
    public function index(Request $request)
    {
        $products=$this->productsRepository->showProducts();
        $topSell=$this->productsRepository->topSell();
        return view('web.homepage.index', ['products' =>$products,'topSell'=>$topSell]);
    }
    
}
