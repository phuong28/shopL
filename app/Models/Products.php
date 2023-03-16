<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['products_id','name','slug','images','description','size','color','price','quantity','addtional_information','categories_id'];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class , 'product_id', 'products_id');
    }
    public function products()
    {
        return $this->hasMany(Products::class , 'categories_id', 'categories_id');
    }
    
}
