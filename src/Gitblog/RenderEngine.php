<?php

namespace Gitblog;

interface RenderEngine
{
    /**
     * @param Post $post
     *
     * @return string
     */
    public function renderPost(Post $post);
}
