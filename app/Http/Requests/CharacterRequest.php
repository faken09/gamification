<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|min:3|max:50|unique:characters,name',
                    'image' => 'mimes:jpeg',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'ingameid' => 'min:3|max:50|unique:characters,name,'.$this->id,
                    'image' => 'mimes:jpeg',
                ];
            }
            default:break;
        }
    }
}
