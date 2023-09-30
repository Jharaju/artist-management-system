<?php

namespace App\Modules\Backend\Website\Artist\Repositories;

use App\Modules\Framework\RepositoryImplementation;

class EloquentArtistRepository extends RepositoryImplementation implements ArtistRepository
{
    protected $entity_name = "artists";

}

