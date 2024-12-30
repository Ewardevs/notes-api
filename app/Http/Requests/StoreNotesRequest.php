<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotesRequest extends FormRequest
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
            "title"=>"max:50",
            "content"=>"max:5000",
        ];
    }

    public function passedValidation(){
        $expectedKeys = ["title","content"];
        $extraKeys = array_diff(array_keys($this->all()),$expectedKeys);

        if(!empty($extraKeys)){
            abort(400,"se encontraron claves no esperadas");
        }
    }
}
