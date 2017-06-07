<?php

namespace GiveMeYourHelp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Router;
use Auth;
use GiveMeYourHelp\User;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {        
        if ($this->user()->isAdmin()) {
            return true;
        }        
        
        return $this->route('user')->id === Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
