<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Http\Controllers\Api\ApiResponser;
use App\Services\User\UserCreator;
use App\Services\User\UserGetter;
use App\Services\User\UserUpdater;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResourcePagination;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use ApiResponser;

    

    public function index(Request $request, UserGetter $userGetter){
        return UserResourcePagination::collection($userGetter->getPaginatedList($request));
        
    }

    
    public function show(Request $request, UserGetter $userGetter, $id){
        return $userGetter->show($id);

        
    }


    public function store(CreateUserRequest $request, UserCreator $userCreator){
        $user = $userCreator->store($request);
        return $this->successResponse(
            UserResource::make($user),
            __('User created successfully'),
            Response::HTTP_CREATED
        );
    }

    public function update(UpdateUserRequest $request, UserUpdater $userUpdater, $id){
        $user = $userUpdater->update($request, $id);
        return $this->successResponse(
            UserResource::make($user),
            __('User updated successfully'),
            Response::HTTP_CREATED
        );

    }

    public function destroy(Request $request, UserUpdater $userUpdater, $id){
        $user = $userUpdater->delete($id);
        return $this->successResponse(
            UserResource::make($user),
            __('User deleted successfully'),
            Response::HTTP_CREATED
        );
    }

    


}
