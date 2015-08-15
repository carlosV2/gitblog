<?php

namespace spec\Gitblog;

use Gitblog\Post;
use Gitblog\PostRepository;
use Gitblog\RenderEngine;
use PhpSpec\ObjectBehavior;

class PostRendererSpec extends ObjectBehavior
{
    function let(PostRepository $repository, RenderEngine $engine)
    {
        $this->beConstructedWith($repository, $engine);
    }

    function it_renders_a_post(PostRepository $repository, RenderEngine $engine)
    {
        $post = new Post('author', 'name', 'content');
        $repository->findByAuthorAndName('author', 'name')->shouldBeCalled()->willReturn($post);

        $engine->renderPost($post)->shouldBeCalled()->willReturn('rendered_content');

        $this->render('author', 'name')->shouldReturn('rendered_content');
    }
}
