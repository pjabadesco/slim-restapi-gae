<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    syslog(LOG_INFO, 'API HOME');
    return 'API DOC HERE';
});

$app->group('/hello', function () {
    $this->get('/method1', 'HelloController:method1');
    $this->get('/method2', 'HelloController:method2');
    $this->get('/method3', 'HelloController:method3');
/*    $this->get   ('',             _Controller_oAuth2::class.':getAll');
    $this->get   ('/{id:[0-9]+}', _Controller_oAuth2::class.':get');
    $this->post  ('',             _Controller_oAuth2::class.':add');
    $this->put   ('/{id:[0-9]+}', _Controller_oAuth2::class.':update');
    $this->delete('/{id:[0-9]+}', _Controller_oAuth2::class.':delete');*/
//})->add(function ($request, $response, $next) {
//	$this->settings['localtable'] = "categories";
//    $response = $next($request, $response);
//    return $response;
});