<?php

namespace App\Services\User;

use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserGetter
{

 /**
     * @var userRepository
     */
    protected $userRepository;

    /**
     *  UserGetter constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getPaginatedList($request){
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $query = "SELECT * FROM `users` LIMIT $offset, $no_of_records_per_page";
        if(isset($request->search)){
            $query. "WHERE first_name LIKE '%$request->search%' WHERE email LIKE '%$request->search%'";
        }
        $user = $this->userRepository->getData($query);
        $q2 = "SELECT COUNT('*') as count FROM `users`";
        $all = $this->userRepository->getData($q2);
        $rows = $all[0]->count;
        $total_pages = ceil($rows / $no_of_records_per_page);

        $data = [];
        $data['user'] = $user;
        $data['pageno'] = $pageno;
        $data['total_pages'] = $total_pages;

        return $data;
    }

    public function show($id){
        $query = "SELECT * FROM `users` WHERE id = '$id'";
        $u = $this->userRepository->getData($query);
        $data = $u[0];
        return $data;
    }

    
}
