<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required',
            'text' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'done' =>'required',
        ];
    }
}
