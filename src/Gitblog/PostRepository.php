<?php

namespace Gitblog;

interface PostRepository
{
    /**
     * @param string $author
     * @param string $name
     *
     * @return Post|null
     */
    public function findByAuthorAndName($author, $name);
}
