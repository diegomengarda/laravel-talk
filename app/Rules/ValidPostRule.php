<?php

namespace App\Rules;

class ValidPostRule
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ];
    }
}
