<?php

namespace Gitblog;

class Post
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @param string $author
     * @param string $name
     * @param string $content
     */
    public function __construct($author, $name, $content)
    {
        $this->author = $author;
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
