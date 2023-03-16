<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;
use App\Repositories\ProductsRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repositories\CategoriesRepository;
use phpDocumentor\Reflection\Types\Array_;






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
    private $categoriesRepository;
    public $arraySlug=[];
    public function __construct(ProductsRepository $productsRepository,CategoriesRepository $categoriesRepository){
        $this->productsRepository=$productsRepository ;
        $this->categoriesRepository=$categoriesRepository ;
        $this->arraySlug=[];
    }
    public function index(Request $request)
    {
        $listProducts=$this->productsRepository->getAllProducts();
        $productPaginate=$this->productsRepository->showShop();
        return view('web.shop.index',['products'=>$listProducts,'paginate'=>$productPaginate]);
    }
    
    public function shopProducts(Request $request)
    {   

        $products=$this->productsRepository->showShopProduct($request->slug);
        $productPaginate=$this->productsRepository->showShopProduct($request->slug);
        array_push($this->arraySlug,$request->slug);
        // print_r($this->arraySlug);
        return view('web.shop.index', ['products' =>$productPaginate,'paginate'=>$productPaginate]);
    }
    public function sortIn(){
        $products=$this->productsRepository->sortIn($this->arraySlug);
        $productPaginate=$this->productsRepository->sortIn($this->arraySlug);
        return view('web.shop.index', ['products' =>$productPaginate,'paginate'=>$productPaginate]);
    }
}
