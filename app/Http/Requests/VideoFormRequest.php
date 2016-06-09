<?php

namespace Desire2Learn\Http\Requests;

use Desire2Learn\Http\Requests\Request;

class VideoFormRequest extends Request
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
            'title'       => 'required',
            'url'         => 'required|url',
            'category'    => 'required',
            'description' => 'required',
        ];
    }
}
