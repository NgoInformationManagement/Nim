@mission
Feature: Missions
    In order to create mission
    As a administrator
    I want to be able to manage mission

    Background:
        Given I am logged in as administrator
          And There are following mission:
             | title                   | description                        | country | startedAt  | endedAt    |
             | Earthquake in Indonesia | Earthquake in Indonesia in 2006    | IN      | 2006-06-01 | 2006-07-01 |
             | Earthquake in Pakistan  | Earthquake in Pakistan in 2005     | PA      | 2005-09-31 | 2006-10-01 |
          And Mission "Earthquake in Indonesia" has following translations for "French" language:
             | title                             | description                               |
             | Tremblement de terre en Indonesie | Tremblement de terre en Indonesie en 2006 |
          And Mission "Earthquake in Pakistan" has following translations for "French" language:
             | title                             | description                               |
             | Tremblement de terre au Pakistan  | Tremblement de terre en Pakistan en 2005  |
          And There are following workers:
            | gender  | firstname  | lastname | type      | function  | arrivedAt  | birthday   | diploma | street                                 | postcode | city     | country |
            | male    | Arnaud     | Langlade | volunteer | Developer | 2005-09-01 | 1985-09-03 | Dut     | 19, rue Jean-Baptiste Carreau          | 64000    | PAU      | FR      |
            | male    | Sébastien  | Lannus   | employee  | Admin Sys | 2005-09-01 | 1985-03-05 | Master  | Del supermercado Pali, 1 cuadra arriba |          | Managua  | NA      |
            | female  | Clémence   | Brig     | employee  | Bocs      | 2008-09-01 | 1985-08-08 | Licence | Cour de la martique                    | 33000    | Bordeaux | FR      |

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
        When I fill in "Title" with "Development mission in Niger" for the language "English"
         And I fill in "Description" with "The project bring help to the population" for the language "English"
         And I click "French"
         And I fill in "Title" with "Mission de développement au Niger" for the language "French"
         And I fill in "Description" with "Ce projet apporte de l'aide à la population" for the language "French"
         And I fill in "Country" with "Niger"
         And I fill in "Started at" with "07/01/2006"
         And I fill in "Ended at" with "08/31/2006"
         And I click "Employees"
         And I check "Arnaud Langlade"
         And I press "Create"
        Then I should be on the page of mission which has "Development mission in Niger" as title
         And I should see "Mission has been successfully created."

    @javascript
    Scenario: Creating a new mission with empties fields
      Given I am on the mission creation page
       When I leave "Title" empty
        And I leave "Description" empty
        And I leave "Country" empty
        And I leave "Started at" empty
        And I leave "Ended at" empty
        And I press "Create"
       Then I should be on the mission creation page
        And I should see "Title" field error
        And I should see "Started" field error

    Scenario: Created mission appears in the list
       Given I created mission "Development mission in Niger"
        When I go on the mission index page
        Then I should see 3 missions in the list
         And I should see mission with name "Development mission in Niger" in the list

    Scenario: Accessing the editing page from the list
        Given I am on the mission index page
         When I click edition button near "Earthquake in Indonesia"
         Then I should be editing mission which has "Earthquake in Indonesia" as title

    @javascript
    Scenario: Updating a mission
       Given I am updating the mission which has "Earthquake in Indonesia" as title
        When I fill in "Title" with "Development mission in Niger" for the language "English"
         And I fill in "Description" with "The project bring help to the population" for the language "English"
         And I fill in "Country" with "France"
         And I fill in "Started at" with "07/01/2006"
         And I fill in "Ended at" with "08/31/2006"
         And I press "Update"
        Then I should be on the page of mission which has "Development mission in Niger" as title
         And I should see "Mission has been successfully updated."

    @javascript
    Scenario: Updating a mission with empties fields
       Given I am updating the mission which has "Earthquake in Indonesia" as title
        When I leave "Title" empty
         And I leave "Description" empty
         And I leave "Country" empty
         And I leave "Started at" empty
         And I leave "Ended at" empty
         And I press "Update"
        Then I should be editing mission which has "Earthquake in Indonesia" as title
         And I should see "Title" field error
         And I should see "Started" field error

    @javascript
    Scenario: Deleting mission via the list button
       Given I am on the mission index page
        When I press deletion button near "Earthquake in Indonesia"
         And I click "Delete" from the confirmation modal
        Then I should still be on the mission index page
         And I should see "Mission has been successfully deleted."
         But I should not see mission with name "Earthquake in Indonesia" in the list

    @javascript
    Scenario: Deleting country
       Given I am on the page of mission which has "Earthquake in Indonesia" as title
        When I press "Delete"
         And I click "Delete" from the confirmation modal
        Then I should be on the mission index page
         And I should see "Mission has been successfully deleted."
         But I should not see mission with name "Earthquake in Indonesia" in the list

    @javascript
    Scenario: Accessing mission details via the list
       Given I am on the mission index page
        When I press details button near "Earthquake in Indonesia"
        Then I should be on the page of mission which has "Earthquake in Indonesia" as title
         And I should see "Earthquake in Indonesia"
         And I should see "Earthquake in Indonesia in 2006"
         And I should see "India"
         And I should see "June 1, 2006"
         And I should see "July 1, 2006"
        When I click "French"
        Then I should see "Tremblement de terre en Indonesie"
         And I should see "Tremblement de terre en Indonesie en 2006"