<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:155'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'address' => ['required'],
            'first_release_year' => ['required'],
            'no_of_albums_released' => ['required'],
        ];
    }
}
