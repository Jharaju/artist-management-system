<?php

namespace App\Services\User;

use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class  UserUpdater
 * @package App\Services\User
 */
class UserUpdater
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


    public function update($request, $id)
    {
        $password = bcrypt($request->password);
        $query = "UPDATE `users` SET first_name = '$request->first_name', last_name = '$request->last_name',
        email = '$request->email', password = '$password',phone = '$request->phone',
        dob = '$request->dob', gender = '$request->gender', address = '$request->address'
        WHERE id = $id";
        return $this->userRepository->update($query);
    }

    public function delete($id){
        $query = "DELETE FROM `users` WHERE id = $id;";
        return $this->userRepository->delete($query);
    }


}
