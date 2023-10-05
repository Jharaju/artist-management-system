<?php

namespace App\Services\Music;

use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class  ArtistUpdater
 * @package App\Services\Artist
 */
class MusicUpdater
{
   /**
     * @var musicRepository
     */
    protected $musicRepository;

    /**
     *  MusicUpdater constructor.
     * @param MusicRepository $musicRepository
     */
    public function __construct(MusicRepository $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }


    public function store($data)
    {
        
    }
}
