<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required | string | max:255',
          'age' => 'required',
          'gender' => 'required',
          'animal_category_id' => 'required',
          'price' => 'required | numeric',
          'body' => 'required',
          'pic1' => 'required | file | image | mimes:jpeg,png,jpg,gif | max:2048',
          'pic2' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048',
          'pic3' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048'
        ];
    }
}
