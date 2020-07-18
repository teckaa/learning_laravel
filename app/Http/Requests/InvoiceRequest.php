<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
             'invoice_no' => 'required|min:1|max:50',
             'invoice_content' => 'required|min:1',
             'invoice_total_balance' => 'required|min:1|max:20',
             'customer' => 'required|min:1|max:20',
         ];
     }
 
     public function messages(){
         return [
             'invoice_no.required' => 'Invoice no is required',
             'invoice_content.required' => 'Invoice content is required',
             'invoice_total_balance.required' => 'Invoice total balance is required',
             'customer.required' => 'Enter your customer name',
         ];
     }
}
