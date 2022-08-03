<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Order::class;
    }


}
