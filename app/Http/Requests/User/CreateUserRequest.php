<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:55'],
            'last_name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:155', 'unique:users'],
            'password' => ['required', 'between:8,255', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'between:8,255'],
            'phone' => ['required', 'max:20'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required']
        ];
    }
}
