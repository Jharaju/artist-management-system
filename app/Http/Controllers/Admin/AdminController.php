<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website\News;
use App\Models\Website\Post;
use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dashboard(){
        return view('welcome');
    }

    




}
