<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCliente extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST") {
            $request = [
                'name' => 'required',
                'cpf' => 'required' 
            ];

        }

        return $request;
    }
}
