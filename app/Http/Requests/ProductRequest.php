<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'category_id'=>'required|exists:categories,id',
            'sales_fees'=>'required|numeric|min:0',
            'sales_mark_up'=>'required|numeric|min:0',
        ];
    }
}
