@content
Feature: I can see my content
  In order to use the site
  users should see a menu to
  view some example content

  Scenario: Can view content menu
    Given that I am an anonymous user    
    When I look at the menu
    Then I should see "My Example Content" in the menu
    
  Scenario: Can view content
    Given that I am an anonymous user    
    When I look at the "My Example Content" node
    Then I should see "Sally is Great" in the content
   
  @blog 
  Scenario: Can view my blog
    Given that I am a logged in user    
    When I look at my blog
    Then I should see "blog" the content
        