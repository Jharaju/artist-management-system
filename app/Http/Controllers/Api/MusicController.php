<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Api\ApiResponser;
use App\Services\Music\MusicCreator;
use App\Services\Music\MusicGetter;
use App\Services\Music\MusicUpdater;
use App\Http\Requests\Music\CreateMusicRequest;
use App\Http\Resources\Music\MusicResource;
use App\Http\Requests\Music\UpdateMusicRequest;


class MusicController extends Controller
{
    use ApiResponser;

    private $musicRepository, $artistRepository;

    public function __construct(MusicRepository $musicRepository, ArtistRepository $artistRepository)
    {
        $this->musicRepository = $musicRepository;
        $this->artistRepository = $artistRepository;
    }

    
    public function index(Request $request){
        
    }

    
    public function edit(Request $request, $id){
        
    }


    public function store(Request $request){
        
    }

    public function update(Request $request, $id){
        

    }

    public function destroy(Request $request, $id){
        
    }

    




}
