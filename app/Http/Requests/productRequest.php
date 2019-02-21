<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'price' => 'required|numeric',
            //'description' => 'alpha_num',
            'sku' => 'numeric|nullable',
            'qty_available' => 'numeric|nullable',
            'supplier_ID' => 'numeric|nullable',
            'supplier_SKU' => 'numeric|nullable',
            'cost' => 'numeric|nullable',
            //'url' =>

        ]; 
    }
}
