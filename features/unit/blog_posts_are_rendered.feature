Feature: Blog posts are rendered
  In order to gain some knowledge
  As a browser user
  I need to be able to get a post rendered in HTML

  @markdown @unit
  Scenario: Posts are rendered in HTML
    Given there is the blog writer "blogger"
    And the writer "blogger" has the filename "post_example.md" with this content
    """
    # This is the title #

    This is the post content with some `code`,
    _emphasis_ and **bold** string
    """
    When I request the content of "post_example" from the writer "blogger"
    Then I should get the following HTML code back
    """
    <h1>This is the title</h1>
    <p>This is the post content with some <code>code</code>,
    <em>emphasis</em> and <strong>bold</strong> string</p>
    """
