<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Website\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request){
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $query = "SELECT * FROM `users` LIMIT $offset, $no_of_records_per_page";
        if(isset($request->search)){
            $query. "WHERE first_name LIKE '%$request->search%' WHERE email LIKE '%$request->search%'";
        }
        $user = $this->userRepository->getData($query);
        $q2 = "SELECT COUNT('*') as count FROM `users`";
        $all = $this->userRepository->getData($q2);
        $rows = $all[0]->count;
        $total_pages = ceil($rows / $no_of_records_per_page);
        return view('admin.pages.user.index', ['user'=>$user, 'pageno'=>$pageno, 'total_pages'=>$total_pages]);
    }

    
    public function edit(Request $request, $id){
        $query = "SELECT * FROM `users` WHERE id = '$id'";
        $u = $this->userRepository->getData($query);
        $update = $u[0];

        return view('admin.pages.user.index', compact('update'));
    }


    public function store(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:55'],
            'last_name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:155', 'unique:users'],
            'password' => ['required', 'between:8,255', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'between:8,255'],
            'phone' => ['required', 'max:20'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required']
        ]);

        $password = bcrypt($request->password);

        $query = "INSERT into `users` (first_name, last_name, email, password, phone, dob, gender, address) VALUES ('$request->first_name', '$request->last_name', '$request->email', '$password', '$request->phone', '$request->dob', '$request->gender', '$request->address')";
        $user = $this->userRepository->create($query);
        if($user){
            Session::flash('success', 'User created successfully.');
            return redirect()->route('user.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('user.index');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:55'],
            'last_name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:155'],
            'password' => ['required', 'between:8,255', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'between:8,255'],
            'phone' => ['required', 'max:20'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required']
        ]);
        $password = bcrypt($request->password);
        $query = "UPDATE `users` SET first_name = '$request->first_name', last_name = '$request->last_name',
        email = '$request->email', password = '$password',phone = '$request->phone',
        dob = '$request->dob', gender = '$request->gender', address = '$request->address'
        WHERE id = $id";

        if($this->userRepository->update($query)){
            Session::flash('success', 'User updated successfully.');
            return redirect()->route('user.index');
        }else{
            Session::flash('error', 'Something went wrong.');
            return redirect()->route('user.index');
        }

    }

    public function destroy(){}


}
