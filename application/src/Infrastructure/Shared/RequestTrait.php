<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared;

use Symfony\Component\HttpFoundation\Request;

trait RequestTrait
{
    public function getJsonRequest(Request $request)
    {
        return json_decode($request->getContent(), true);
    }
}