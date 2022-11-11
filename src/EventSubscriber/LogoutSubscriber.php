<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutSubscriber implements EventSubscriberInterface
{   
    public function __construct(
        private UrlGeneratorInterface $UrlGenerator
    )
    {
        
    }
    public function onLogout($event): void
    {
        // ...
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'logout' => 'onLogout',
        ];
    }
}
