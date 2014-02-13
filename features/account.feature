@account
Feature: User account profile edition
    In order to manage my personal information
    As a logged user
    I want to be able to edit my name and my email

    Background:
      Given I am logged in as administrator

  Scenario: Accessing mission details
     Given I am on my account profile edition page
      Then I should see "admin"
       And I should see "admin@admin.fr"

    @javascript
    Scenario: Editing my information with a blank data
      Given I am on my account profile edition page
        And I follow "Edit profil"
       When I leave "Email" empty
        And I leave "Username" empty
        And I leave "Current password" empty
        And I press "Update"

       Then I should still be on my account profile edition page
        And I should see "Please enter an email"
        And I should see "Please enter a username"
        And I should see "This value should be the user current password"

    @javascript
    Scenario: Editing my information with an invalid email
      Given I am on my account profile edition page
        And I follow "Edit profil"
       When I fill in "Email" with "wrongemail"
        And I fill in "Username" with "John"
        And I fill in "Current password" with "password"
        And I press "Update"
       Then I should still be on my account profile edition page
        And I should see "The email is not valid"

    @javascript
    Scenario: Successfully editing my personal information
      Given I am on my account profile edition page
        And I follow "Edit profil"
       When I fill in "Email" with "johndoe@example.com"
        And I fill in "Username" with "John"
        And I fill in "Current password" with "password"
        And I press "Update"
       Then I should be on my account profile page
        And I should see "The profile has been updated"

     @javascript
     Scenario: I go back to the detail page
      Given I am on my account profile edition page
        And I follow "Edit profil"
        And I follow "Back"
       Then I should be on my account profile page