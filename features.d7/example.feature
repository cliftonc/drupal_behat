@content @drupal7
Feature: I can see my content
    
  This is a long description of the test case, in reality it can contain
  anything, but should be less than 80 characters wide as this can 
  make it difficult to read.

  Scenario: Can view content menu
    Given that I am an anonymous user    
    When I look at the primary links menu
    Then I should see "Example Content" in the menu
    
  Scenario: Can view content
    Given that I am an anonymous user    
    When I look at the "node/6" node
    Then I should see "Not this content" in the content
  
  @blog
  Scenario: Can view my blog
    Given that I am a logged in user    
    When I look at my blog
    Then I should see "test entry" the content
        
  
