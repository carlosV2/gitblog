<?php

namespace Application;

use Infrastructure\PostRepository\FlysystemPostRepository;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

$app['gitblog.post.repository.type'] = 'flysystem';

$app['gitblog.post.repository.flysystem.root'] = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'posts';
$app['gitblog.post.repository.flysystem.service'] = $app->share(function () use ($app) {
    $adapter = new Local($app['gitblog.post.repository.flysystem.root']);
    $filesystem = new Filesystem($adapter);

    return new FlysystemPostRepository($filesystem);
});

$app['gitblog.post.repository.service'] = $app->share(function () use ($app) {
    $type = $app['gitblog.post.repository.type'];

    try {
        return $app['gitblog.post.repository.' . $type . '.service'];
    } catch (\InvalidargumentException $e) {
        return $app['gitblog.post.repository.flysystem.service'];
    }
});
