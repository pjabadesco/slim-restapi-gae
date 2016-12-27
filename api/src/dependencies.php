<?php
// DIC configuration

$container = $app->getContainer();

$container['NeuralinkController'] = function ($c) {
    return new Controllers\NeuralinkController();
};
