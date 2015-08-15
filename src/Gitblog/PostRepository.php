<?php

namespace Gitblog;

interface PostRepository
{
    /**
     * @param string $author
     * @param string $name
     *
     * @return Post
     */
    public function findByAuthorAndName($author, $name);
}
