<?php

namespace spec\Gitblog;

use PhpSpec\ObjectBehavior;

class PostSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('author', 'name', 'content');
    }

    function it_exposes_the_author()
    {
        $this->getAuthor()->shouldReturn('author');
    }

    function it_exposes_the_name()
    {
        $this->getName()->shouldReturn('name');
    }

    function it_exposes_the_content()
    {
        $this->getContent()->shouldReturn('content');
    }
}
