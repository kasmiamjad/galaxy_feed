<?php

namespace App\Http\Middleware;

use Closure;

class XmlResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Check if the response is XML
        if ($response->headers->get('Content-Type') == 'application/xml') {
            // If response content is already XML, set it as the content
            $response->setContent($response->getContent());
        }

        return $response;
        
    }
}
