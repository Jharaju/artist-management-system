<?php

namespace App\Services\Music;

use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MusicGetter
{

 /**
     * @var musicRepository
     */
    protected $musicRepository;

    /**
     *  ArtistGetter constructor.
     * @param MusicRepository $musicRepository
     */
    public function __construct(MusicRepository $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }


    
}
