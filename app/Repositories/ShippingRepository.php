<?php

namespace App\Repositories;

use App\Models\Shipping;

class ShippingRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Shipping::class;
    }


}
