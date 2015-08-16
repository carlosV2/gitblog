<?php

namespace Application;

use Infrastructure\RenderEngine\ParsedownRenderEngine;

$app['gitblog.render.engine.type'] = 'parsedown';

$app['gitblog.render.engine.parsedown.service'] = $app->share(function () use ($app) {
    $parsedown = new \Parsedown();

    return new ParsedownRenderEngine($parsedown);
});

$app['gitblog.render.engine.service'] = $app->share(function () use ($app) {
    $type = ['gitblog.render.engine.type'];

    try {
        return $app['gitblog.render.engine.' . $type . '.service'];
    } catch (\InvalidargumentException $e) {
        return $app['gitblog.render.engine.parsedown.service'];
    }
});
