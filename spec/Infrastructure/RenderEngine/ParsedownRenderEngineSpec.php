<?php

namespace spec\Infrastructure\RenderEngine;

use Gitblog\Post;
use Gitblog\RenderEngine;
use PhpSpec\ObjectBehavior;

class ParsedownRenderEngineSpec extends ObjectBehavior
{
    function let(\Parsedown $parsedown)
    {
        $this->beConstructedWith($parsedown);
    }

    function it_is_a_RenderEngine()
    {
        $this->shouldHaveType(RenderEngine::class);
    }

    function it_transforms_a_Post_into_a_rendered_string(\Parsedown $parsedown)
    {
        $parsedown->text('content')->shouldBeCalled()->willReturn('rendered_content');

        $this->renderPost(new Post('author', 'name', 'content'))->shouldReturn('rendered_content');
    }
}
