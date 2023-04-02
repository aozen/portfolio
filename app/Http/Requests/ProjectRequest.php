<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'status' => 'nullable|string',
            'order' => 'nullable|integer',
            'production_date' => 'nullable|date_format:Y-m-d',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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
