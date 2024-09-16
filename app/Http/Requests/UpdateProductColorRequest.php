<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductColorRequest extends FormRequest
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
            'name' => "max:255 | unique:product_colors,name,$id,id",
            'color' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name là trường bắt buộc.',
            'name.max' => 'name không được vượt quá :max ký tự.',
            'name.unique' => 'name đã bị trùng',
            'color.max' => 'color không được vượt quá :max ký tự.',
        ];
    }
}
