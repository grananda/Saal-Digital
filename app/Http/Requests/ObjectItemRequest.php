<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ObjectItemRequest extends FormRequest
{
    const OBJECT_ITEM_NAME_REQUIRED = 'client.validation.objectItem.name.required';
    const OBJECT_ITEM_NAME_MIN = 'client.validation.objectItem.name.min';
    const OBJECT_ITEM_NAME_MAX = 'client.validation.objectItem.name.max';

    const OBJECT_ITEM_DESCRIPTION_REQUIRED = 'client.validation.objectItem.description.required';
    const OBJECT_ITEM_DESCRIPTION_MIN = 'client.validation.objectItem.description.min';
    const OBJECT_ITEM_DESCRIPTION_MAX = 'client.validation.objectItem.description.max';

    const OBJECT_ITEM_TYPE_REQUIRED = 'client.validation.objectItem.type.required';
    const OBJECT_ITEM_TYPE_MIN = 'client.validation.objectItem.type.min';
    const OBJECT_ITEM_TYPE_MAX = 'client.validation.objectItem.type.max';

    use ApiRequest;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:5|max:50',
            'description' => 'required|min:10|max:500',
            'type'        => 'required|min:2|max:15',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'        => trans(self::OBJECT_ITEM_NAME_REQUIRED),
            'name.min'             => trans(self::OBJECT_ITEM_NAME_MIN),
            'name.max'             => trans(self::OBJECT_ITEM_NAME_MAX),
            'description.required' => trans(self::OBJECT_ITEM_DESCRIPTION_REQUIRED),
            'description.min'      => trans(self::OBJECT_ITEM_DESCRIPTION_MIN),
            'description.max'      => trans(self::OBJECT_ITEM_DESCRIPTION_MAX),
            'type.required'        => trans(self::OBJECT_ITEM_TYPE_REQUIRED),
            'type.min'             => trans(self::OBJECT_ITEM_TYPE_MIN),
            'type.max'             => trans(self::OBJECT_ITEM_TYPE_MAX),

        ];
    }
}
