<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->title)->slug() . "-" . uniqid(),
        ]);
    }
}
