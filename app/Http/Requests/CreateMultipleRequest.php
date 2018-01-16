<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMultipleRequest extends FormRequest
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
            'title' => ['required'],
            'url' => ['required'],
            'theme' => ['required'],
            'sintesis' => ['required']
        ];
    }

    public function messages ()
    {
        return [
                'title.required' => 'Por favor escribe un titulo',
                'ulr.required' => 'Por favor escribe un link',
                'theme.required' => 'Selecciona un tema',
                'sintesis.required' => 'Ingresa la sintesis',
        ];
    }
}
