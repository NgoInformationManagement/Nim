Feature: Missions
    In order to create mission
    As a store administrator
    I want to be able to manage mission

    Background:
        Given I am logged in as administrator
          And There are following mission:
             | title                   | description                        | country |
             | Earthquake in Indonesia | Earthquake in Indonesia in 2006    | IN      |
             | Earthquake in Pakistan  | Earthquake in Pakistan in 2005     | PA      |
          And Mission "Earthquake in Indonesia" has following translations for "French" language:
             | title                             | description                               |
             | Tremblement de terre en Indonesie | Tremblement de terre en Indonesie en 2006 |
          And Mission "Earthquake in Pakistan" has following translations for "French" language:
             | title                             | description                               |
             | Tremblement de terre au Pakistan  | Tremblement de terre en Pakistan en 2005  |

    Scenario: Seeing empty index of mission
       Given There are no missions
        When I am on the mission index page
        Then I should see "There are no mission to display"

    Scenario: Seeing index of missions
       Given I am on the dashboard page
        When I follow "Missions"
        Then I should be on the mission index page
         And I should see 2 missions in the list

    Scenario: Accessing to the mission creation page
       Given I am on the dashboard page
        When I follow "Missions"
         And I follow "New Mission"
        Then I should be on the mission creation page

    @javascript
    Scenario: Creating a new mission
       Given I am on the mission creation page
        When I fill in "title" with "Development mission in Niger" and the language "English"
         And I fill in "description" with "The project bring help to the population" and the language "English"
         And I fill in "Country" with "Niger"
         And I press "Create"
        Then I should be on the page of mission "Development mission in Niger"
         And I should see "Mission has been successfully created."

    Scenario: Created mission appears in the list
       Given I created mission "Development mission in Niger"
        When I go on the mission index page
        Then I should see 3 missions in the list
         And I should see mission with name "Development mission in Niger" in the list

    Scenario: Accessing the editing page from the list
        Given I am on the mission index page
         When I click edition button near "Earthquake in Indonesia"
         Then I should be editing mission "Earthquake in Indonesia"

    @javascript
    Scenario: Updating a mission
       Given I am updating the mission "Earthquake in Indonesia"
        When I fill in "title" with "Development mission in Niger" and the language "English"
         And I fill in "description" with "The project bring help to the population" and the language "English"
         And I fill in "Country" with "Niger"
         And I press "Update"
        Then I should be on the page of mission "Development mission in Niger"
         And I should see "Mission has been successfully updated."

    Scenario: Deleting mission via the list button
       Given I am on the mission index page
        When I press deletion button near "Earthquake in Indonesia"
        Then I should still be on the mission index page
         And I should see "Mission has been successfully deleted."
         But I should not see mission with name "Earthquake in Indonesia" in the list

    Scenario: Deleting country
       Given I am on the page of mission "Earthquake in Indonesia"
        When I press "Delete"
        Then I should be on the mission index page
         And I should see "Mission has been successfully deleted."
         But I should not see country with name "Earthquake in Indonesia" in the list

    Scenario: Accessing mission details via the list
       Given I am on the mission index page
        When I press details button near "Earthquake in Indonesi"
        Then I should be on the page of mission "Earthquake in Indonesia"