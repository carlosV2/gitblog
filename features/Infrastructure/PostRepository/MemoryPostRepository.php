<?php

namespace Infrastructure\PostRepository;

use Everzet\PersistedObjects\CallbackObjectIdentifier;
use Everzet\PersistedObjects\InMemoryRepository;
use Everzet\PersistedObjects\Repository;
use Gitblog\Post;
use Gitblog\PostRepository;

class MemoryPostRepository implements PostRepository
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = new InMemoryRepository(new CallbackObjectIdentifier(function (Post $post) {
            return $this->getObjectIdentifierByPost($post);
        }));
    }

    /**
     * @param Post $post
     *
     * @return string
     */
    private function getObjectIdentifierByPost(Post $post)
    {
        return $this->getObjectIdentifierByAuthorAndName($post->getAuthor(), $post->getName());
    }

    /**
     * @param string $author
     * @param string $name
     *
     * @return string
     */
    private function getObjectIdentifierByAuthorAndName($author, $name)
    {
        return md5($author . '_' . $name);
    }

    /**
     * @param Post $post
     */
    public function save(Post $post)
    {
        $this->repository->save($post);
    }

    /**
     * {@inheritdoc}
     */
    public function findByAuthorAndName($author, $name)
    {
        return $this->repository->findById($this->getObjectIdentifierByAuthorAndName($author, $name));
    }
}
