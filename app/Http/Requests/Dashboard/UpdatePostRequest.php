<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->id === $this->post->user_id;
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
            'slug' => "required|string|unique:posts,slug,{$this->post->id}",
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ];
    }
    protected function prepareForValidation()
    {
        $titleChange = $this->request->get('title') !== $this->post->title;
        $slug = $this->post->slug;
        if ($titleChange) {
            $slug = str($this->title)->slug() . "-" . uniqid();
        }
        $this->merge([
            'slug' => $slug,
        ]);
    }
}
