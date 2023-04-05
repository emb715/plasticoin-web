<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|exists:users,email|not_in:' . auth()->user()->email,
            'amount' => 'required|integer|between:0,' . auth()->user()->plasticoins_sum_amount,
        ];
    }
}
