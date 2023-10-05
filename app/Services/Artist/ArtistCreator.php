<?php

namespace App\Services\Artist;

use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class  ArtistCreator
 * @package App\Services\Artist
 */
class ArtistCreator
{
    /**
     * @var artistRepository
     */
    protected $artistRepository;

    /**
     *  ArtistCreator constructor.
     * @param ArtistRepository $artistRepository
     */
    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function store($request)
    {
        $query = "INSERT into `artists` (name, dob, gender, address, first_release_year, no_of_albums_released) VALUES ('$request->name', '$request->dob', '$request->gender', '$request->address', '$request->first_release_year', '$request->no_of_albums_released')";
        $artist = $this->artistRepository->create($query);
        return $artist;
    }
}
