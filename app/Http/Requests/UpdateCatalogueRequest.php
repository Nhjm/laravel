<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogueRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'name' => "max:255 | unique:catalogues,name,$id,id",
            'is_active' => 'max:1'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'name không được vượt quá :max ký tự.',
            'name.unique' => 'name đã bị trùng',
            'is_active.max' => 'is_active không được vượt quá :max ký tự'
        ];
    }
}
