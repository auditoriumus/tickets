<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $refreshToken
 */
class RefreshJwtRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'refreshToken' => 'required|string|max:255|exists:user_refresh_token,refresh_token',
        ];
    }
}
