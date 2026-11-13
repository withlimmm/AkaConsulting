<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Redirect 301 semua variasi URL ke domain utama (APP_URL), misalnya
 * https://www.akagroupconsulting.com/... dan /index.php/..., supaya Google
 * hanya mengindeks satu versi dan sinyal ranking tidak terpecah.
 */
class CanonicalHost
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! app()->isProduction() || ! in_array($request->method(), ['GET', 'HEAD'], true)) {
            return $next($request);
        }

        $canonical = parse_url(config('app.url'));
        $canonicalHost = $canonical['host'] ?? null;
        $canonicalScheme = $canonical['scheme'] ?? 'https';

        if (! $canonicalHost) {
            return $next($request);
        }

        $uriPath = parse_url($request->getRequestUri(), PHP_URL_PATH) ?: '/';
        $isWww = strcasecmp($request->getHost(), 'www.' . $canonicalHost) === 0;
        $hasIndexPhp = preg_match('#^/index\.php(/|$)#i', $uriPath) === 1;

        if ($isWww || $hasIndexPhp) {
            $path = '/' . ltrim(preg_replace('#^/index\.php#i', '', $uriPath), '/');
            $query = $request->getQueryString();
            $target = $canonicalScheme . '://' . $canonicalHost . $path . ($query ? '?' . $query : '');

            return redirect()->away($target, 301);
        }

        return $next($request);
    }
}
