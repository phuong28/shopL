<?php

namespace App\Repositories;

use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Products::class;
    }
    public function showProducts()
    {
        $products = $this->model->paginate(4);
        return $products;
    }
    public function topSell()
    {
        //SELECT`order_detail`. product_name as name, Sum(`order_detail`.quantity) as quantities , products.images as image FROM `order_detail` INNER JOIN products on products.products_id=order_detail.product_id GROUP by product_id ORDER by quantities DESC Limit 4;
        $topSell = $this->builder()
            ->select('od.product_id as products_id','od.product_name as name', DB::raw('Sum(od.quantity) as quantities'), 'pd.images as image')
            ->from('products as pd')
            ->join('order_detail as od', 'od.product_id', '=', 'pd.products_id')
            ->groupBy('od.product_name', 'pd.images','od.product_id')
            ->orderBy('quantities', 'DESC')
            ->limit(6)
            ->get();
        return $topSell;
    }
    public function viewDetail($id){
        $viewProduct=$this->model->where('products_id',$id)->first();
        return $viewProduct;
    }
    public function findId($id){
        $product=$this->model->where('products_id',$id)->first();
        return $product;
    }
    public function getProductsByIds($iDs){
        $product = $this->model->whereIn('products_id',$iDs)->get();
        return $product;
    }


}
