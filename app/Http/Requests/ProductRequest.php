<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
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
            //this rules contain products data
            'name' => 'required|max:255',
            'mereks_id' => 'required',
            'types_id' => 'required',
            'description' => 'required',
            'price' => 'required|integer'
        ];
    }
}
