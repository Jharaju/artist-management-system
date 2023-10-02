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

    public function uploadImage(Request $request, $fieldName){
        $inputName = $fieldName.'_image';
        $file = $request->file($inputName);
        if($file){
            try{
            $img = time(). '.'.$file->getClientOriginalName();
            $file->storeAs('musics', $img, 'public');
            $response['full_url'] = asset("storage/musics/".$img);
            $response['image_name'] = $img;
            $response['path'] = asset("storage/musics/".$img);
            return $response;
        }
        catch (\Exception $e)
        {
            dd($e);
        }

        }
    }

    




}
