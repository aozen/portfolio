<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'icon' => 'nullable|string|max:255',
            'status' => [
                'nullable',
                'string',
                Rule::in(Status::list()),
            ],
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
