<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Contact::class;
    }


}
