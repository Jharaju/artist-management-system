<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Music\Repositories\MusicRepository;
use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MusicController extends Controller
{
    //
    private $musicRepository, $artistRepository;

    public function __construct(MusicRepository $musicRepository, ArtistRepository $artistRepository)
    {
        $this->musicRepository = $musicRepository;
        $this->artistRepository = $artistRepository;
    }

    
    public function index(Request $request){
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $q = "SELECT m.id, m.title, m.album_name, m.genre, a.name as artist_name FROM `music` m INNER JOIN `artists` a ON a.id = m.artist_id LIMIT $offset, $no_of_records_per_page";
        // $query = "SELECT * FROM `music` LIMIT $offset, $no_of_records_per_page";
        if(isset($request->search)){
            $q. "WHERE m.title LIKE '%$request->search%' WHERE m.album_name LIKE '%$request->search%' WHERE a.name LIKE '%$request->search%'";
        }
        $music = $this->musicRepository->getData($q);
        $q2 = "SELECT COUNT('*') as count FROM `music`";
        $all = $this->musicRepository->getData($q2);
        $rows = $all[0]->count;
        $total_pages = ceil($rows / $no_of_records_per_page);

        $q2 = "SELECT * FROM `artists`";
        $artist = $this->artistRepository->getData($q2);

        return view('admin.pages.music.index', ['music'=>$music, 'pageno'=>$pageno, 'total_pages'=>$total_pages, 'artist' => $artist]);
    }

    
    public function edit(Request $request, $id){
        $query = "SELECT * FROM `music` WHERE id = '$id'";
        $u = $this->musicRepository->getData($query);
        $update = $u[0];

        $q2 = "SELECT * FROM `artists`";
        $artist = $this->artistRepository->getData($q2);

        return view('admin.pages.music.index', compact('update', 'artist'));
    }


    public function store(Request $request){
        $request->validate([
            'artist' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'music' => ['required'],
            'genre' => ['required']
        ]);

        $query = "INSERT into `music` (artist_id, title, album_name, genre) VALUES ('$request->artist', '$request->title', '$request->music', '$request->genre')";
        $music = $this->musicRepository->create($query);
        if($music){
            Session::flash('success', 'Music created successfully.');
            return redirect()->route('music.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('music.index');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'artist' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'music' => ['required'],
            'genre' => ['required']
        ]);
        
        $query = "UPDATE `music` SET artist_id = '$request->artist', title = '$request->title',
        album_name = '$request->music', genre = '$request->genre'
        WHERE id = '$id'";

        if($this->musicRepository->update($query)){
            Session::flash('success', 'Music updated successfully.');
            return redirect()->route('music.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('music.index');
        }

    }

    public function destroy(){}

    




}
