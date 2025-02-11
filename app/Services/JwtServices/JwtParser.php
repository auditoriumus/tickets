<?php
declare(strict_types=1);

namespace App\Services\JwtServices;

use DateTimeImmutable;
use Illuminate\Auth\AuthenticationException;
use Lcobucci\Clock\FrozenClock;
use Lcobucci\JWT\JwtFacade;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Constraint\StrictValidAt;


class JwtParser
{
    public function __construct(
        protected string $key,
        protected string $jwtToken
    )
    {
    }

    protected function getKey(): InMemory
    {
        return InMemory::base64Encoded(
            $this->key,
        );
    }


    /**
     * @throws AuthenticationException
     * @return array<string, mixed>
     */
    public function parseJwtToken(): array
    {
        try {
            return ((new JwtFacade())->parse(
                $this->jwtToken,
                new SignedWith(new Sha256(), $this->getKey()),
                new StrictValidAt(
                    new FrozenClock(new DateTimeImmutable())
                )
            ))->claims()->all();
        } catch (\Throwable $e) {
            throw new AuthenticationException($e->getMessage());
        }
    }
}
