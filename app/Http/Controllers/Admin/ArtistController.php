<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\Artist\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArtistController extends Controller
{
    //
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
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
        $query = "SELECT * FROM `artists` LIMIT $offset, $no_of_records_per_page";
        if(isset($request->search)){
            $query. "WHERE name LIKE '%$request->search%' WHERE first_release_year LIKE '%$request->search%'";
        }
        $artist = $this->artistRepository->getData($query);
        $q2 = "SELECT COUNT('*') as count FROM `artists`";
        $all = $this->artistRepository->getData($q2);
        $rows = $all[0]->count;
        $total_pages = ceil($rows / $no_of_records_per_page);
        return view('admin.pages.artist.index', ['artist'=>$artist, 'pageno'=>$pageno, 'total_pages'=>$total_pages]);
    }

    
    public function edit(Request $request, $id){
        $query = "SELECT * FROM `artists` WHERE id = '$id'";
        $u = $this->artistRepository->getData($query);
        $update = $u[0];

        return view('admin.pages.artist.index', compact('update'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:155'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required'],
            'first_release_year' => ['required'],
            'no_of_albums_released' => ['required'],
        ]);

        $query = "INSERT into `artists` (name, dob, gender, address, first_release_year, no_of_albums_released) VALUES ('$request->name', '$request->dob', '$request->gender', '$request->address', '$request->first_release_year', '$request->no_of_albums_released')";
        $artist = $this->artistRepository->create($query);
        if($artist){
            Session::flash('success', 'Artist created successfully.');
            return redirect()->route('artist.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('user.index');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:155'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required'],
            'first_release_year' => ['required'],
            'no_of_albums_released' => ['required'],
        ]);
        
        $query = "UPDATE `artists` SET name = '$request->name', dob = '$request->dob',
        gender = '$request->gender', address = '$request->address',first_release_year = '$request->first_release_year',
        no_of_albums_released = '$request->no_of_albums_released'
        WHERE id = $id";

        if($this->artistRepository->update($query)){
            Session::flash('success', 'Artist updated successfully.');
            return redirect()->route('artist.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('user.index');
        }

    }

    public function destroy(){}

    




}
