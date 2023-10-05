<?php

namespace App\Services\User;

use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Exception;

/**
 * Class  UserCreator
 * @package App\Services\User
 */
class UserCreator
{
    /**
     * @var userRepository
     */
    protected $userRepository;

    /**
     *  OfficeGetter constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store($request)
    {
        DB::beginTransaction();
        try{

        $password = bcrypt($request->password);
        $query = "INSERT into `users` (first_name, last_name, email, password, phone, dob, gender, address) VALUES ('$request->first_name', '$request->last_name', '$request->email', '$password', '$request->phone', '$request->dob', '$request->gender', '$request->address')";
        return $this->userRepository->create($query);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
