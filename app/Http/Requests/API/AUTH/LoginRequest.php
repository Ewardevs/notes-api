<?php

namespace App\Http\Requests\API\AUTH;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "email"=>"required|email",
            "password"=>"required|min:8"
        ];
    }

    public function passedValidation(){
        $expectedKeys = ["email","password"];
        $extraKeys = array_diff(array_keys($this->all()),$expectedKeys);

        if (!empty($extraKeys)){
            abort(400,"se encontraron claves no esperadas : ". implode(", ",$extraKeys));
        }
    }
}
