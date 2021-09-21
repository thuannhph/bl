<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $formRules = [
            "title" => [
                "required",
                Rule::unique('blogs')->ignore($this->id),
            ],
            "content" => [
                "required",
            ],
            "image" => [
                "required",
            ],
        ];
        return $formRules;
    }
    public function messages()
    {
        return [
            'title.required' => 'Hãy điền tên tiêu đề',
            'title.unique' => 'Tên tiêu đề đã tồn tại',
            'content.required' => 'Hãy ghi nội dung',
            'image.required' => 'Hãy chọn ảnh sản phẩm',
            'image.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, png, jpeg)',
        ];
    }
}
