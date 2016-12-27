<?php
// DIC configuration

$container = $app->getContainer();

$container['HelloController'] = function ($c) {
    return new Controllers\HelloController();
};

$container['UsersController'] = function ($c) {
    return new Controllers\UsersController();
};
