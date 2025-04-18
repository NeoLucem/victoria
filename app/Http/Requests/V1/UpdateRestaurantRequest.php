<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request)
    {
        $method = $request->method();
        if ($method == 'PUT') {
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
        }else{
            return [
                "user_id"=>['sometimes'],
                "name"=>['sometimes'],
                "address"=>['sometimes'],
                "city"=>['sometimes'],
                "email"=>['sometimes', 'email'],
                "phone"=>['sometimes'],
                "website"=>['sometimes'],
                "description"=>['sometimes'],
                "logo"=>['sometimes'],
                "cover_image"=>['sometimes'],
                "status"=>['sometimes'],
            ];
        }
    }
}
