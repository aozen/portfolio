<?php

namespace App\Http\Requests;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($this->route('post'))
            ],
            'description' => 'nullable|string',
            'text' => 'required|string',
            'status' => [
                'nullable',
                Rule::in(Status::list()),
            ],
            'category_id' => 'required|exists:categories,id',
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
