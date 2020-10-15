<?php

namespace App\Repositories\Frontend\Auth;


use App\Repositories\BaseRepository;
use App\Models\School;

class SchoolRepository  extends BaseRepository
{

    /**
     * Constructer function
     *
     * @param School $model
     */
    public function __construct(School $model)
    {
        $this->model = $model;
    }
}
