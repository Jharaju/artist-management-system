<?php

namespace App\Modules\Backend\Website\Music\Repositories;

use App\Modules\Framework\RepositoryImplementation;

class EloquentMusicRepository extends RepositoryImplementation implements MusicRepository
{
    protected $entity_name = "musics";
    

}

