<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class , 'product_id', 'products_id');
    }

    
}
