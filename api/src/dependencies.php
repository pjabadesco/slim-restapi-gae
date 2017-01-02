<?php
// DIC configuration

$container = $app->getContainer();

$container['Main'] = function ($c) {
    return new Libs\Main();
};

$container['Restrict'] = function ($c) {
    return new Libs\Restrict($c->get('Main'));
};

$container['HelloController'] = function ($c) {
    return new Controllers\HelloController($c->get('Main'));
};

$container['UsersController'] = function ($c) {
    return new Controllers\UsersController($c->get('Main'));
};
