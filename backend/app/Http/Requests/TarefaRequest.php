<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tarefa' => ['required'],
            'descricao' => ['nullable'] ,
            'status' => ['integer', 'required'] 
        ];
    }
}
