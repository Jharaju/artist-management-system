<?php

namespace App\Services\Artist;

use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class  ArtistUpdater
 * @package App\Services\Artist
 */
class ArtistUpdater
{
   /**
     * @var artistRepository
     */
    protected $artistRepository;

    /**
     *  ArtistUpdater constructor.
     * @param ArtistRepository $artistRepository
     */
    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }


    public function update($request, $id)
    {
        $query = "UPDATE `artists` SET name = '$request->name', dob = '$request->dob',
        gender = '$request->gender', address = '$request->address',first_release_year = '$request->first_release_year',
        no_of_albums_released = '$request->no_of_albums_released'
        WHERE id = $id";

        return $this->artistRepository->update($query);
    }


    public function delete($id){
        $query = "DELETE FROM `artists` WHERE id = $id;";
        return $this->artistRepository->delete($query);
    }



}
