<?php

namespace Gitblog;

interface PostRepository
{
    /**
     * @param string $name
     * @param string $author
     *
     * @return Post
     */
    public function findByNameAndAuthor($name, $author);
}
