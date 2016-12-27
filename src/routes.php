<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/Neuralink', function () {
    $this->get('/method1', 'NeuralinkController:method1');
    $this->get('/method2', 'NeuralinkController:method2');
    $this->get('/method3', 'NeuralinkController:method3');
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