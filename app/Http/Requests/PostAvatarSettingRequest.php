<?php

namespace Desire2Learn\Http\Requests;

use Desire2Learn\Http\Requests\Request;

class PostAvatarSettingRequest extends Request
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
        return [
            'avatar' => 'required|image|max:10240',
        ];
    }
}
