<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Slide::class;
    }


}
