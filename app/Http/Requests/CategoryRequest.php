<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'nullable|integer',
        ];
    }

    protected function failedValidation($validator): void
    {
        $errors = $validator->errors();
        $response = response()->json([
            'message' => 'Data is invalid',
            'details' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
