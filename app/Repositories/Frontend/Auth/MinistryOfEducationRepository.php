<?php

namespace App\Repositories\Frontend\Auth;


use App\Repositories\BaseRepository;
use App\Models\MinistryOfEducation;

class MinistryOfEducationRepository  extends BaseRepository
{

    /**
     * Constructor
     *
     * @param MinistryOfEducation $ministryOfEducation
     */
    public function __construct(MinistryOfEducation $model)
    {
        $this->model = $model;
    }
}