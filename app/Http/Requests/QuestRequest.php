<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestRequest extends FormRequest
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
                    'title' => 'required|min:2|max:130|unique:quests,title',
                    'description' => 'min:5',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'min:2|max:130|unique:quests,title,'.$this->id,
                    'description' => 'min:5',

                ];
            }
            default:break;
        }
    }
}
