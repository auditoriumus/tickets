<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testLoginWithoutEmail(): void
    {
        $response = $this->postJson(route('login'), ['password' => Hash::make('password')]);
        $response->assertStatus(422);
    }

    public function testLoginWithoutPassword(): void
    {
        $response = $this->postJson(route('login'), ['email' => Str::random(10).'@test.test']);
        $response->assertStatus(422);
    }

    public function testLoginRandomEmail(): void
    {
        $response = $this->postJson(route('login'), [
            'email' => Str::random(10).'@test.test',
            'password' => Hash::make('password')
        ]);
        $response->assertStatus(422);
    }
}
