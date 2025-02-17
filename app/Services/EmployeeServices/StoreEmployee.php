<?php
declare(strict_types=1);

namespace App\Services\EmployeeServices;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreEmployee
{
    public function handle(array $data): string
    {
        $pwd = $this->generateRandomPwd();
        $data['password'] = Hash::make($pwd);

        User::create($data);

        return $pwd;
    }

    protected function generateRandomPwd(): string
    {
        return Str::random(8);
    }
}
