<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required',
            'text' => 'sometimes',
            'date' => 'required',
            'time' => 'required',
            'done' =>'required',
        ];
    }
}
