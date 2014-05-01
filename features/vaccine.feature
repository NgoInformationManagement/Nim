@vaccine
Feature: Vaccines
    In order to create vaccine
    As a administrator
    I want to be able to manage vaccine

    Background:
        Given I am logged in as administrator
          And There are following vaccine:
             | title  | description              |
             | Rage   | Description of the rage  |
             | Mumps  | Description of the mumps |
          And Vaccine "Rage" has following translations for "French" language:
             | title      | description            |
             | Rage       | Description de la rage |
          And Vaccine "Mumps" has following translations for "French" language:
             | title      | description               |
             | Oreillons  | Description des oreillons |

    Scenario: Seeing empty index of vaccine
       Given There are no vaccines
        When I am on the vaccine index page
        Then I should see "There are no vaccine to display"

    Scenario: Seeing index of vaccines
       Given I am on the dashboard page
        When I follow "Vaccines"
        Then I should be on the vaccine index page
         And I should see 2 vaccines in the list

    Scenario: Accessing to the vaccine creation page
       Given I am on the dashboard page
        When I follow "Vaccines"
         And I follow "New vaccine"
        Then I should be on the vaccine creation page

    @javascript
    Scenario: Creating a new vaccine
       Given I am on the vaccine creation page
        When I fill in "Title" with "Measles" for the language "English"
         And I fill in "Description" with "Measles" for the language "English"
         And I click "French"
         And I fill in "Title" with "Rougeole" for the language "French"
         And I fill in "Description" with "Rougeole" for the language "French"
         And I press "Create"
        Then I should be on the page of vaccine which has "Measles" as title
         And I should see "Vaccine has been successfully created."
         And I should see "Measles"
         And I should see "Measles"

    @javascript
    Scenario: Creating a new vaccine with empties fields
      Given I am on the vaccine creation page
       When I leave "Title" empty
        And I leave "Description" empty
        And I press "Create"
       Then I should be on the vaccine creation page
        And I should see "Title" field error

    Scenario: Created vaccine appears in the list
       Given I created vaccine "Development vaccine in Niger"
        When I go on the vaccine index page
        Then I should see 3 vaccines in the list
         And I should see vaccine with name "Development vaccine in Niger" in the list

    Scenario: Accessing the editing page from the list
        Given I am on the vaccine index page
         When I click edition button near "Rage"
         Then I should be editing vaccine which has "Rage" as title

    @javascript
    Scenario: Updating a vaccine
       Given I am updating the vaccine which has "Rage" as title
        When I fill in "Title" with "Measles" for the language "English"
         And I fill in "Description" with "Description of the measles" for the language "English"
         And I press "Update"
        Then I should be on the page of vaccine which has "Measles" as title
         And I should see "Vaccine has been successfully updated."

    @javascript
    Scenario: Updating a vaccine with empties fields
       Given I am updating the vaccine which has "Rage" as title
        When I leave "Title" empty
         And I leave "Description" empty
         And I press "Update"
        Then I should be editing vaccine which has "Rage" as title
         And I should see "Title" field error

    @javascript
    Scenario: Deleting vaccine via the list button
       Given I am on the vaccine index page
        When I press deletion button near "Rage"
         And I click "Delete" from the confirmation modal
        Then I should still be on the vaccine index page
         And I should see "Vaccine has been successfully deleted."
         But I should not see vaccine with name "Rage" in the list

    @javascript
    Scenario: Deleting country
       Given I am on the page of vaccine which has "Rage" as title
        When I press "Delete"
         And I click "Delete" from the confirmation modal
        Then I should be on the vaccine index page
         And I should see "Vaccine has been successfully deleted."
         But I should not see vaccine with name "Rage" in the list

    @javascript
    Scenario: Accessing vaccine details via the list
       Given I am on the vaccine index page
        When I press details button near "Rage"
        Then I should be on the page of vaccine which has "Rage" as title
         And I should see "Rage"
         And I should see "Description of the rage"
        When I click "French"
        Then I should see "Rage"
         And I should see "Description de la rage"