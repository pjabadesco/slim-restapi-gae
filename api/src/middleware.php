<?php

use Controllers\ratelimiter;

$app->add(function ($request, $response, $next) {
    $rateLimiter = new RateLimiter(new \Memcache, $_SERVER["REMOTE_ADDR"]);
    try {
        $responsen = $response->withHeader('Content-Type', 'application/json')
                            ->withHeader('X-Powered-By', $this->settings['PoweredBy']);
        $rateLimiter->limitRequestsInMinutes($this->settings['api_rate_limiter']['requests'], $this->settings['api_rate_limiter']['inmins']);
        return $next($request,$responsen); 
    } catch (Exception $e) {
        return $responsen->withStatus(429)
                ->withHeader('RateLimit-Limit', $this->settings['api_rate_limiter']['requests']);                
    }
});

