<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tarefa' => ['nullable', 'string'],
            'descricao' => ['nullable', 'string'],
            'status' => ['nullable', 'integer'] 
        ];
    }
}
