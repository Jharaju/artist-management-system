<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportArtist;
use App\Http\Controllers\Api\ApiResponser;
use App\Http\Resources\Artist\ArtistResource;
use App\Http\Requests\Artist\CreateArtistRequest;
use App\Http\Requests\Artist\UpdateArtistRequest;
use App\Models\Artist;
use App\Services\Artist\ArtistCreator;
use App\Services\Artist\ArtistGetter;
use App\Services\Artist\ArtistUpdater;
use Illuminate\Http\Response;
use App\Http\Resources\Artist\ArtistResourcePagination;


class ArtistController extends Controller
{
    use ApiResponser;

    
    public function index(Request $request, ArtistGetter $artistGetter){
        return ArtistResourcePagination::collection($artistGetter->getPaginatedList($request));
        
    }

    
    public function show(Request $request, ArtistGetter $artistGetter, $id){
        return $artistGetter->show($id);

        
    }


    public function store(CreateArtistRequest $request, ArtistCreator $artistCreator){
        $artist = $artistCreator->store($request);
        return $this->successResponse(
            ArtistResource::make($artist),
            __('Artist created successfully'),
            Response::HTTP_CREATED
        );
    }

    public function update(UpdateArtistRequest $request, ArtistUpdater $artistUpdater, $id){
        $artist = $artistUpdater->update($request, $id);
        return $this->successResponse(
            ArtistResource::make($artist),
            __('Artist updated successfully'),
            Response::HTTP_CREATED
        );

    }

    public function destroy(Request $request, ArtistUpdater $artistUpdater, $id){
        $artist = $artistUpdater->delete($id);
        return $this->successResponse(
            ArtistResource::make($artist),
            __('Artist deleted successfully'),
            Response::HTTP_CREATED
        );
    }






}
