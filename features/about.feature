Feature: About
  In order to see a working about page
  As a web user
  I need to get a successful response on the about page

  Scenario: Getting a working about page
    Given I am on "/about"
    Then I should see "About"