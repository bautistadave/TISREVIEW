<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuxiCreateRequest extends Request
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
          'name' => 'required|max:50',
          'surname' => 'required|alpha|max:50',
          'email' => 'required|email|max:50|unique:users',
          'phone' => 'numeric',
          'password' => 'required|max:50',
          'confirmar_contrasena' => 'required|same:password',
        ];
    }
}
