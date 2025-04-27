<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateEmployeeRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        $method = $request->method();
        if ($method == 'PUT') {
            return [
                "name" => ['required'],
                "email" => ['required', 'email'],
                "role" => ['required'],
                "restaurant_id" => ['required', 'exists:restaurants,id'],
            ];
        } else {
            return [
                "name" => ['sometimes'],
                "email" => ['sometimes', 'email'],
                "role" => ['sometimes'],
                "restaurant_id" => ['sometimes', 'exists:restaurants,id'],
            ];
        }
    }
}
