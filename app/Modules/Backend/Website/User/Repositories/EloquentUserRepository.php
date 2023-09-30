<?php

namespace App\Modules\Backend\Website\User\Repositories;

use App\Modules\Framework\RepositoryImplementation;

class EloquentUserRepository extends RepositoryImplementation implements UserRepository
{
    protected $entity_name = "users";

    

}

