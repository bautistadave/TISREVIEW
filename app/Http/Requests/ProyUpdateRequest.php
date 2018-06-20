<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProyUpdateRequest extends Request
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
           // 'titulo' => 'required',
           // 'autor' => 'required',
            //'tutor_id' => 'required',
           // 'namemodal' => 'required',
           // 'namecarre' => 'required',
           // 'nameare' => 'required',
            'path' => 'required',
        ];
    }
}
