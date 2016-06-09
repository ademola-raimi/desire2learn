<?php

namespace Desire2Learn\Http\Requests;

use Auth;
use Desire2Learn\Http\Requests\Request;

class ProfileSettingsFormRequest extends Request
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
            'username'   => 'required|max:255|unique:users,username,'. Auth::user()->id,
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|max:255|unique:users,email,'. Auth::user()->id,
        ];
    }
}
