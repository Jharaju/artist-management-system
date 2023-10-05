<?php

namespace App\Services\Music;

use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class  MusicCreator
 * @package App\Services\Music
 */
class MusicCreator
{
    /**
     * @var musicRepository
     */
    protected $musicRepository;

    /**
     *  MusicCreator constructor.
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
