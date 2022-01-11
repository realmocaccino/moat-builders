<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
			'username' => 'required|unique:users,username',
			'password' => 'required',
			'role' => 'required|in:user,admin'
        ];
    }
}