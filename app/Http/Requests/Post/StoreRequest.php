<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
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
            'title' => ['string', 'required'],
            'content' => ['string', 'max:500'],
            'title' => ['string', 'max:500'],
            'image' => ['nullable', 'image']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок поста обязателен.',
            'content.max' => 'Текст поста не должен превышать 500 символов.',
            'image.image' => 'Файл должен быть изображением.',
        ];
    }
}
