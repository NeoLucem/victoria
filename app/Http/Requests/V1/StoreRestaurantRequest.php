<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            "user_id"=>['required'],
            "name"=>['required'],
            "address"=>['required'],
            "city"=>['required'],
            "email"=>['required', 'email'],
            "phone"=>['required'],
            "website"=>['required'],
            "description"=>['required'],
            "logo"=>['required'],
            "cover_image"=>['required'],
            "status"=>['required'],

        ];
    }
}
