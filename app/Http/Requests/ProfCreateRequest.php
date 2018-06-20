<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfCreateRequest extends Request
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
          'name' => 'required|alpha|max:50',
          'surname' => 'required|alpha|max:50',
          'email' => 'required|email|unique:users',
          'phone' => 'required|numeric',
          'password' => 'required|max:50',
          'nameare_id' => 'required',
          'confirmar_contrasena' => 'required|same:password',
          
        ];
    }
}
