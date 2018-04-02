<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
                    'name' => 'required|min:2|max:130|unique:locations,name',
                    'description' => 'min:5',
                    'image' => 'mimes:jpeg,jpg,png',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'min:2|max:130|unique:locations,name,'.$this->id,
                    'description' => 'min:5',
                    'image' => 'mimes:jpeg,jpg,png',

                ];
            }
            default:break;
        }
    }
}
