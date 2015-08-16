<?php

namespace spec\Infrastructure\PostRepository;

use Gitblog\Post;
use Gitblog\PostRepository;
use League\Flysystem\Filesystem;
use PhpSpec\ObjectBehavior;

class FlysystemPostRepositorySpec extends ObjectBehavior
{
    function let(Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem);
    }

    function it_is_a_PostRepository()
    {
        $this->shouldHaveType(PostRepository::class);
    }

    function it_searches_for_a_Post_given_an_author_and_a_name(Filesystem $filesystem)
    {
        $filesystem->read('author/name.md')->shouldBeCalled()->willReturn('content');

        $post = $this->findByAuthorAndName('author', 'name');

        $post->shouldBeAnInstanceOf(Post::class);
        $post->getAuthor()->shouldReturn('author');
        $post->getName()->shouldReturn('name');
        $post->getContent()->shouldReturn('content');
    }
}
