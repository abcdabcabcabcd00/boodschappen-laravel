<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetContentTypeHeader
{
    protected $types = [
        'text/',
        'application/json',
        'application/javascript'
        // add any additional content types here
    ];

    public function handle(Request $request, Closure $next)
    {
        /** @var Symfony\Component\HttpFoundation\Response $response */
        $response = $next($request);

        $contentTypeHeader = $response->headers->get('Content-Type');

        foreach ($this->types as $type) {
            if ($contentTypeHeader && stripos($contentTypeHeader, $type) === 0 && stripos($contentTypeHeader, 'charset=UTF-8') === false) {
                $response->header('Content-Type', $contentTypeHeader . '; charset=UTF-8');
                break;
            }
        }

        return $response;
    }
}
