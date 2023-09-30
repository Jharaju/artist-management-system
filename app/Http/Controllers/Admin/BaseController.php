<?php


namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {

    }


    public function save_image(Request $request,$fieldName)
    {
        try{
            $path =  $request->{$fieldName.'_image'}->store('public/photo');
            if (!$path)
                return url('storage');
            $dirs = explode('/', $path);
            if ($dirs[0] === 'public')
                $dirs[0] = 'storage';
            $response['full_url'] = url(implode('/', $dirs));
            $response['image_name'] = ($request->{$fieldName.'_image'})->hashName();
            $response['path'] = (implode('/', $dirs));
            return $response;

        }
        catch (\Exception $e)
        {
            dd($e);
        }

    }
}
