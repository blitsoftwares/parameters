<?php
/**
 * Created by PhpStorm.
 * User: lucaspasquetto
 * Date: 30/11/18
 * Time: 10:00
 */

namespace Blit\Parameters\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ParameterRequest extends FormRequest
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
            'parameter_category_id' => 'required|numeric|min:1',
            'slug' => [
                Rule::unique('parameters')->ignore($this->parameter)
            ],
            'name' => 'required',
            'type' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'parameter_category_id.required' => 'Selecione uma categoria',
            'parameter_category_id.numeric' => 'Selecione uma categoria',
            'parameter_category_id.min' => 'Selecione uma categoria',
            'name.required' => 'Digite um nome',
            'slug.unique' => 'Nome já usado nesta categoria.',
        ];
    }

}