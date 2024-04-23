<?php

declare(strict_types=1);

namespace App\Domain\User\EventSubscriber;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTNotFoundEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class LexikJWTListener
{
    public function __construct(
        private readonly RequestStack $requestStack
    ) {
    }

    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        $payload = $event->getData();
        $event->setData($payload);
    }

    public function onJWTNotFound(JWTNotFoundEvent $event): void
    {
    }

    public function onJWTInvalid(JWTInvalidEvent $event): void
    {
    }

    public function onJWTExpired(JWTExpiredEvent $event): void
    {
    }

    public function onJWTDecoded(JWTDecodedEvent $event): void
    {
    }

    public function onJWTSuccess(AuthenticationSuccessEvent $event): void
    {
    }
}
