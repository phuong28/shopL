<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => ':attribute không được để đống',
            'email.email' => ':attribute không đúng định dạng',
            'name.required' => ':attribute không để trống',
            'subject.required'=>':attribute không để trống'
        ];
    }
    public function attributes()
    {
        return [
            'email' => ' Địa chỉ email',
            'name' => 'Tên',
            'subject'=>'Nội dung không được để trống'
        ];
    }
}