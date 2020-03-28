<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|max:14',
            'cpf' => 'required|unique:employees|max:14',
            'cep' => 'required|max:9',
            'address' => 'nullable',
            'neighborhood' => 'nullable',
            'city' => 'nullable',
            'uf' => 'nullable|max:2'
        ];
    }
}
