<?php

namespace App\Services\Artist;

use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArtistGetter
{

 /**
     * @var artistRepository
     */
    protected $artistRepository;

    /**
     *  ArtistGetter constructor.
     * @param ArtistRepository $artistRepository
     */
    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }


    public function getPaginatedList($request){
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $query = "SELECT * FROM `artists` LIMIT $offset, $no_of_records_per_page";
        if(isset($request->search)){
            $query. "WHERE name LIKE '%$request->search%' WHERE first_release_year LIKE '%$request->search%'";
        }
        $artist = $this->artistRepository->getData($query);
        $q2 = "SELECT COUNT('*') as count FROM `artists`";
        $all = $this->artistRepository->getData($q2);
        $rows = $all[0]->count;
        $total_pages = ceil($rows / $no_of_records_per_page);

        $data = [];
        $data['user'] = $artist;
        $data['pageno'] = $pageno;
        $data['total_pages'] = $total_pages;

        return $data;
    }

    public function show($id){
        $query = "SELECT * FROM `artists` WHERE id = '$id'";
        $u = $this->artistRepository->getData($query);
        $data = $u[0];
        return $data;
    }

    
}
