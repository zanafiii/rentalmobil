<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
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
            'products_id' => 'required',
            'users_id' => 'required',
            'tanggal_sewa' => 'required|date',
            'lama_sewa' => 'required|integer',
            'status' => 'required'
        ];
    }
}
