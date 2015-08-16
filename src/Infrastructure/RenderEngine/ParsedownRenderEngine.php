<?php

namespace Infrastructure\RenderEngine;

use Gitblog\Post;
use Gitblog\RenderEngine;

class ParsedownRenderEngine implements RenderEngine
{
    /**
     * @var \Parsedown
     */
    private $parsedown;

    /**
     * @param \Parsedown $parsedown
     */
    public function __construct(\Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    /**
     * {@inheritdoc}
     */
    public function renderPost(Post $post)
    {
        return $this->parsedown->text($post->getContent());
    }
}
