<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'slug' => 'required|string|max:50|unique:categories,slug,' . $this->category->id
        ];
    }

    public function prepareForValidation()
    {
        $slug = $this->category->slug;
        if ($this->request->get('name') !== $this->name) {
            $slug = Str::slug($this->name) . "-" . uniqid();
        }
        $this->merge([
            'slug' => $slug
        ]);
    }
}
