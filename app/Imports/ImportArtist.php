<?php

namespace App\Imports;

use App\Models\Artist;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportArtist implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if($row[0] != ''){
            $d= Date::excelToDateTimeObject($row[1])->format('y-m-d');
            $row[1] = Carbon::parse($d)->format('Y-m-d');

            $d2= Date::excelToDateTimeObject($row[4])->format('Y');
            $row[4] = Carbon::parse($d2)->format('Y');
            
            
            // dd($row);
        return new Artist([
            'name' => $row[0],
            'dob' => $row[1],
            'gender' => $row[2],
            'address' => $row[3],
            'first_release_year' => $row[4],
            'no_of_albums_released' => $row[5],
        ]);
        
        }else{
            Session::flash('error', 'Empty row detected.');
            return redirect()->route('artist.index');
        }
    }
}
