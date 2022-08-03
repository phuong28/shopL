<?php

namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Categories::class;
    }


}
