<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

// use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCatalogueRequest extends FormRequest
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
            'name' => 'required | max:255 | unique:catalogues',
            'catalogue_id' => 'max:255',
            'is_active' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name là trường bắt buộc.',
            'name.max' => 'name không được vượt quá :max ký tự.',
            'name.unique' => 'name đã bị trùng',
            'catalogue_id.max' => 'catalogue_id không được vượt quá :max ký tự.',
            'is_active.max' => 'is_active không được vượt quá :max ký tự.',
        ];
    }

}
