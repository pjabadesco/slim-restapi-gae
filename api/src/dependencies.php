<?php
// DIC configuration

$container = $app->getContainer();

$container['MainController'] = function ($c) {
    return new Controllers\MainController();
};

$container['HelloController'] = function ($c) {
    return new Controllers\HelloController();
};

$container['UsersController'] = function ($c) {
    return new Controllers\UsersController();
};
