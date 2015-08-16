<?php

namespace Application;

use Gitblog\PostRenderer;
use Silex\Application;

$app = new Application();

require_once 'PostRepository.php';
require_once 'RenderEngine.php';

$app['gitblog.post.renderer'] = $app->share(function () use ($app) {
    return new PostRenderer($app['gitblog.post.repository.service'], $app['gitblog.render.engine.service']);
});

return $app;
