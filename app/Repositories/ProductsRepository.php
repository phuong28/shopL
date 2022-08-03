<?php

namespace App\Repositories;

use App\Models\Products;

class ProductsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Products::class;
    }


}
