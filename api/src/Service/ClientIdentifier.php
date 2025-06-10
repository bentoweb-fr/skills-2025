<?php 

// src/Service/ClientIdentifier.php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

class ClientIdentifier
{
    private array $allowedOrigins = [
        'https://api.skills2025.local' => 'api',
        'https://skills2025.local' => 'client-a',
        'https://fakedomain.local' => 'client-b',
    ];


    public function getClientFromRequest(Request $request): ?string
    {
        $origin = $request->headers->get('Origin')
            ?? parse_url($request->headers->get('Referer') ?? '', PHP_URL_SCHEME).'://'.parse_url($request->headers->get('Referer') ?? '', PHP_URL_HOST);

            var_dump($request->headers->get('Referer'));

        return $this->allowedOrigins[$origin] ?? null;
    }
}
