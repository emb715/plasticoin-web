<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255', $this->uniqueEmailRule(),
            ],
            'phone' => ['nullable', 'string', 'max:255'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', Password::defaults()],
            'terms' => 'boolean|accepted',
        ];
    }

    /**
     * Get the unique email rule.
     */
    private function uniqueEmailRule(): Unique
    {
        return auth()->user()
            ? Rule::unique(User::class, 'email')->whereNot('id', auth()->user()->id)
            : Rule::unique(User::class, 'email');
    }
}
