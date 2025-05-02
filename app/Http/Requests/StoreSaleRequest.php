<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|numeric|min:0',
            'quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) {
                    $productId = $this->input("product_id"); // Get the product ID for the current index
        
                    // Fetch product stock from the database
                    $product = Product::find($productId);
                    if (!$product) {
                        return $fail("No Product");
                    }
                    if ($value > $product->quantity) {
                        return $fail("Maximum quantity is {$product->quantity}");
                    }
                },
            ],
        ];
    }
}