<?php
declare(strict_types=1);

namespace App\Services\JwtServices;

use DateInterval;
use DateTimeImmutable;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\JwtFacade;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class JwtGenerator
{
    /**
     * @param string $key
     * @param array<string, string> $data
     * @param string $expiration
     */
    public function __construct(
        protected string $key,
        protected array $data = [],
        protected string $expiration = '7 days',
    )
    {
    }

    protected function getKey(): InMemory
    {
        return InMemory::base64Encoded(
            $this->key,
        );
    }

    public function issueJwtToken(): string
    {
        return ((new JwtFacade())->issue(
            new Sha256(),
            $this->getKey(),
            function (Builder $builder, DateTimeImmutable $dateTimeImmutable) {
                foreach ($this->data as $key => $value) {
                    $builder = $builder->withClaim($key, $value);
                }

                return $builder->expiresAt(
                    $dateTimeImmutable->add(DateInterval::createFromDateString($this->expiration))
                );
            }
        ))->toString();
    }
}
