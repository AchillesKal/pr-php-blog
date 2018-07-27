Feature: Blog Post Admin Area
  In order to maintain the blog posts shown on the site
  As an admin user
  I need to be able to add/edit/delete blog posts

  Scenario: List available blog posts
    Given there are 5 blog posts
    And I am on "/admin"
    When I click "Blog Posts"
    Then I should see 5 blog posts