<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    syslog(LOG_INFO, 'API HOME');
    return 'API DOC HERE';
});

$app->group('/hello', function () {
    $this->get('/method1', 'HelloController:method1');
    $this->get('/method2', 'HelloController:method2');
    $this->get('/method3', 'HelloController:method3');
});

$app->group('/users', function () {
    $this->get('', 'UsersController:fetchAll');
    $this->get('/{id}', 'UsersController:fetch');
    $this->post('', 'UsersController:create');
    $this->patch('/{id}', 'UsersController:patch');
    $this->put('/{id}', 'UsersController:update');
    $this->delete('/{id}', 'UsersController:delete');
});