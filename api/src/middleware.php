<?php

use Libs\ratelimiter;

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
});

$app->add(function ($request, $response, $next) {
    $rateLimiter = new RateLimiter(new \Memcache, $_SERVER["REMOTE_ADDR"]);
    try {
        $responsen = $response->withHeader('Content-Type', 'application/json')
                            ->withHeader('X-Powered-By', $this->settings['PoweredBy']);
        $rateLimiter->limitRequestsInMinutes($this->settings['api_rate_limiter']['requests'], $this->settings['api_rate_limiter']['inmins']);
        return $next($request,$responsen); 
    } catch (Libs\RateExceededException $e) {
        return $responsen->withStatus(429)
                ->withHeader('RateLimit-Limit', $this->settings['api_rate_limiter']['requests']);                
    } catch (Exception $e) {
        if(isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
            return $responsen->withStatus(404)
                ->write('Error');            
        }else{
            return $response->withStatus(404)
                ->write($e);
        }
    }
});
