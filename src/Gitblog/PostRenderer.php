<?php

namespace Gitblog;

class PostRenderer
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * @var RenderEngine
     */
    private $engine;

    /**
     * @param PostRepository $repository
     * @param RenderEngine   $engine
     */
    public function __construct(PostRepository $repository, RenderEngine $engine)
    {
        $this->repository = $repository;
        $this->engine = $engine;
    }

    /**
     * @param string $author
     * @param string $name
     *
     * @return string
     */
    public function render($author, $name)
    {
        $post = $this->repository->findByAuthorAndName($author, $name);

        return $this->engine->renderPost($post);
    }
}
