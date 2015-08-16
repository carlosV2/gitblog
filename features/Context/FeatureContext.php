<?php

namespace Context;

use Behat\Behat\Context\Context;
use Gitblog\Post;
use Infrastructure\PostRepository\MemoryPostRepository;
use Behat\Gherkin\Node\PyStringNode;
use Silex\Application;

class FeatureContext implements Context
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @var string
     */
    private $response;

    /**
     * @BeforeScenario
     */
    public function prepareTestFolders()
    {
        $this->app = require __DIR__ . '/../../src/Application/Gitblog.php';

        $this->app['debug'] = true;
        $this->app['gitblog.post.repository.type'] = 'memory';
        $this->app['gitblog.post.repository.memory.service'] = $this->app->share(function () {
            return new MemoryPostRepository();
        });
    }

    /**
     * @Given the author :author has the post name :postName with this content
     *
     * @param string       $author
     * @param string       $postName
     * @param PyStringNode $content
     */
    public function theAuthorHasThePostNameWithThisContent($author, $postName, PyStringNode $content)
    {
        $post = new Post($author, $postName, $content->getRaw());

        $this->app['gitblog.post.repository.service']->save($post);
    }

    /**
     * @When I request the content from the author :author and the post name :postName
     */
    public function iRequestTheContentFromTheAuthorAndThePostName($author, $postName)
    {
        $this->response = $this->app['gitblog.post.renderer']->render($author, $postName);
    }

    /**
     * @Then I should get the following HTML code back
     */
    public function iShouldGetTheFollowingHtmlCodeBack(PyStringNode $string)
    {
        expect($this->response)->toBe($string->getRaw());
    }
}
