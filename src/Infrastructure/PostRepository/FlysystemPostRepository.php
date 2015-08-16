<?php

namespace Infrastructure\PostRepository;

use Gitblog\Post;
use Gitblog\PostRepository;
use League\Flysystem\Filesystem;

class FlysystemPostRepository implements PostRepository
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function findByAuthorAndName($author, $name)
    {
        $content = $this->filesystem->read($author . DIRECTORY_SEPARATOR . $name . '.md');

        return new Post($author, $name, $content);
    }
}
