<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_id' => 'required',
            'name' => 'required|min:4',
            'details' => 'required|min:4',
            'editorial' => 'required|min:4',
            'price' => 'required|integer',
            'language' => 'required',
            'release_date' => 'required',
        ];
    }
}
