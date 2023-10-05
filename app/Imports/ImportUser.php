<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Shared;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] != ''){
            $d= Date::excelToDateTimeObject($row[5])->format('y-m-d');
            $date = Carbon::parse($d)->format('Y-m-d');
        return new User([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'email' => $row[2],
            'password' => bcrypt($row[3]),
            'phone' => $row[4],
            'dob' => $date,
            'gender' => $row[6],
            'address' => $row[7],
        ]);
        
    }else{
        Session::flash('error', 'Empty row detected.');
        return redirect()->route('user.index');
    }
    }
}
