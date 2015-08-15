Feature: Blog posts are rendered
  In order to gain some knowledge
  As a browser user
  I need to be able to get a post rendered in HTML

  @markdown @unit
  Scenario: Posts are rendered in HTML
    Given the author "blogger" has the post name "post_example" with this content
    """
    # This is the title #

    This is the post content with some `code`,
    _emphasis_ and **bold** string
    """
    When I request the content from the author "blogger" and the post name "post_example"
    Then I should get the following HTML code back
    """
    <h1>This is the title</h1>
    <p>This is the post content with some <code>code</code>,
    <em>emphasis</em> and <strong>bold</strong> string</p>
    """
