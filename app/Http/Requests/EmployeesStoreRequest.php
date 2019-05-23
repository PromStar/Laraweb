<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EmployeesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
           'first_name' => 'required|string|min:2|max:50',
           'last_name' => 'required|string|min:2|max:50',
           'company' => 'nullable|exists:companies,id',
           'email' => 'nullable|email',
           'phone' => 'nullable|string|max:20',
      ];
    }
}
