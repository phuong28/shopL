<?php

namespace App\Repositories;

use App\Models\ProductOrder;

class ProductOrderRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return ProductOrder::class;
    }


}
