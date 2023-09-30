<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Modules\Backend\Website\User\Repositories\UserRepository;

class RegisteredUserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
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

        

        return redirect('/');
    }
}
