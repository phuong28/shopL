<?php

namespace App\Repositories;

use App\Models\Categories;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoriesRepository extends BaseRepository
{
    /**
     * @return string
     */

    public function getModel()
    {
        return Categories::class;
    }
    public function showProducts($slug = '')
    {
        $categories = $this->model->with(['products'])->where('slug', $slug)->first();
        return $categories->products;
    }
}
