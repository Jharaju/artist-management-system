<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    //
    private $musicRepository;

    public function __construct(MusicRepository $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }

    

    




}
