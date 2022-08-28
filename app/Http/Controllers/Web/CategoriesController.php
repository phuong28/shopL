<?php

namespace App\Http\Controllers\Web;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
class CategoriesController extends Controller
{
    private  $categoriesRepository;
    public function __construct(CategoriesRepository $categoriesRepository){
        $this->categoriesRepository=$categoriesRepository ;
    }
    public function showProducts(Request $request)
    {
        $products=$this->categoriesRepository->showProducts($request->slug);
        return view('web.categories.show', ['products' =>$products]);
    }
    
    
}
