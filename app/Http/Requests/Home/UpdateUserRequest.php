<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'image' => 'nullable|image|max:2048',
            'username' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:users,slug,' . Auth::user()->id
        ];
    }

    public function prepareForValidation()
    {
        $user = Auth::user();
        $usernameChange = $this->request->get('username') !== $user->username;
        $slug = $user->slug;
        if ($usernameChange) {
            $slug = str($this->request->get('username'))->slug() .  uniqid();
        }
        $this->merge([
            'slug' => $slug
        ]);
    }
}
