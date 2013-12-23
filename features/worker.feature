@worker
Feature: Worker
    In order to create worker
    As a administrator
    I want to be able to manage worker

    Background:
        Given I am logged in as administrator
          And There are following workers:
             | gender  | firstname  | lastname | agency | function  | arrivedAt  | birthday   | diploma | street                                 | postcode | city     | country |
             | male    | Arnaud     | Langlade | France | Developer | 2005-09-01 | 1985-09-03 | Dut     | 19, rue Jean-Baptiste Carreau          | 64000    | PAU      | FR      |
             | male    | Sébastien  | Lannus   | Nica   | Admin Sys | 2005-09-01 | 1985-03-05 | Master  | Del supermercado Pali, 1 cuadra arriba |          | Managua  | NA      |
             | female  | Clémence   | Brig     | France | Bocs      | 2008-09-01 | 1985-08-08 | Licence | Cour de la martique                    | 33000    | Bordeaux | FR      |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following emails:
             | label  | address          |
             | email  | arnaud@gmail.fr  |
             | email2 | arnaud@gmail.com |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following phones:
             | type  | number     |
             | phone | 0212457812 |
             | fax   | 0212415814 |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following contacts:
             | firstname  | lastname | street                                 | postcode | city     | country |
             | Didier     | Anglade  | 193, rue Cours du Médoc                | 33300    | Bordeaux | FR      |
             | Nina       | Poisson  | Del supermercado Pali, 1 cuadra arriba | 33300    | Bordeaux | FR      |
           And Contact with firstname "Didier" and lastname "Anglade" has following emails:
             | label  | address          |
             | email  | didier@gmail.fr  |
             | email2 | didier@gmail.com |
           And Contact with firstname "Didier" and lastname "Anglade" has following phones:
             | type  | number     |
             | phone | 0512457812 |
             | fax   | 0512415814 |

#  Scenario: Seeing empty index of worker
#       Given There are no workers
#        When I am on the worker index page
#        Then I should see "There are no worker to display"
#
#    Scenario: Seeing index of workers
#       Given I am on the dashboard page
#        When I follow "Workers"
#        Then I should be on the worker index page
#         And I should see 3 workers in the list
#
#    Scenario: Accessing to the worker creation page
#       Given I am on the dashboard page
#        When I follow "Workers"
#         And I follow "New worker"
#        Then I should be on the worker creation page

#    @javascript
#    Scenario: Creating a new worker
#       Given I am on the worker creation page
#        When I fill in "Gender" with "Male"
#         And I fill in "First name" with "Rémi"
#         And I fill in "Last name" with "Anglade"
#         And I fill in "Street" with "Langlade"
#         And I fill in "Postcode" with "54000"
#         And I fill in "City" with "City"
#         And I select "France" from "Country"
#         And I fill in "Birthday" with "03/03/1984"
#         And I fill in "Function" with "Integrator"
#         And I fill in "Arrived at" with "10/13/2010"
#         And I press "Add" to add an item to "Emails"
#         And I fill in "Address" in the item #1 of the "Emails" collection with "remi@email.fr"
#         And I press "Add" to add an item to "Phones"
#         And I fill in "Type" in the item #1 of the "Phones" collection with "fax"
#         And I fill in "Number" in the item #1 of the "Phones" collection with "05949838473"
#         And I press "Create"
#        Then I should be editing worker which has "Anglade" as lastname
#         And I should see "Worker has been successfully created."
#        When I follow "Contacts"
#         And I press "Add" in the active tab
#         And I fill in visible "First name" with "Rémi"
#         And I fill in visible "Last name" with "Anglade"
#         And I fill in visible "Street" with "Langlade"
#         And I fill in visible "Postcode" with "54000"
#         And I fill in visible "City" with "City"
#         And I select "France" from visible "Country"
#         And I press "Add" to add an item to "Emails"
#         And I fill in "Address" in the item #1 of the "Emails" collection with "it@agency.fr"
#         And I press "Add" to add an item to "Phones"
#         And I fill in "Type" in the item #1 of the "Phones" collection with "fax"
#         And I fill in "Number" in the item #1 of the "Phones" collection with "05949838473"
#         And I press "Update"
#        Then I should be on the page of worker which has "Anglade" as lastname
#         And I should see "Worker has been successfully updated."

#    @javascript
#    Scenario: Creating a new worker with empties or wrongs fields
#      Given I am on the worker creation page
#        And I leave "First name" empty
#        And I leave "Last name" empty
#        And I leave "Birthday" empty
#        And I leave "Function" empty
#        And I leave "Arrived at" empty
#        And I press "Create"
#       Then I should be on the worker creation page
#        And I should see "First name" field error
#        And I should see "Last name" field error
#        And I should see "Birthday" field error
#        And I should see "Function" field error
#        And I should see "Arrived at" field error
#        And I should see "You should define 1 phone or more"
#       When I click "Add" to add an item to "Email"
#        And I fill in "Address" in the item #1 of the "Emails" collection with "wrongMail"
#        And I click "Add" to add an item to "Phone"
#        And I press "Create"
#       Then I should be on the worker creation page
#        And I should see "Address" field error in the item #1 of the "Emails" collection
#        And I should see "Number" field error in the item #1 of the "Phone" collection


#    Scenario: Created worker appears in the list
#       Given I created worker which has "Julien" "Dupont" as name
#        When I go on the worker index page
#        Then I should see 4 workers in the list
#         And I should see worker with name "Dupont" in the list

#    Scenario: Accessing the editing page from the list
#        Given I am on the worker index page
#         When I click edition button near "Langlade"
#         Then I should be editing worker which has "Langlade" as lastname

#    @javascript
#    Scenario: Updating a worker
#       Given I am updating the worker which has "Sébastien" "Lannus" as name
#        When I fill in "Gender" with "Male"
#         And I fill in "First name" with "Rémi"
#         And I fill in "Last name" with "Anglade"
#         And I fill in "Street" with "Langlade"
#         And I fill in "Postcode" with "54000"
#         And I fill in "City" with "City"
#         And I fill in "Birthday" with "1984-03-03"
#         And I fill in "Function" with "Integrator"
#         And I fill in "Arrived at" with "2010-10-13"
#         And I click "Add" to add an item to "Emails"
#         And I fill in "Label" with "Label"
#         And I fill in "Address" with "email@email.fr"
#         And I click "Add" to add an item to "Phones"
#         And I fill in "Type" with "Fax"
#         And I fill in "Number" with "05949838473"
#         And I click "Contacts"
#         And I click "Add" to add an item in current tab
#         And I fill in "First name" with "Rémi"
#         And I fill in "Last name" with "Anglade"
#         And I click "Add" to add an item to "Phones"
#         And I fill in "Type" with "Fax"
#         And I fill in "Number" with "05949838473"
#         And I press "Update"
#        Then I should be on the page of worker which has "Rémi" "Langlade" as name
#         And I should see "Worker has been successfully updated."

#    Scenario: Deleting worker via the list button
#       Given I am on the worker index page
#        When I press deletion button near "Langlade"
#        Then I should still be on the worker index page
#         And I should see "Worker has been successfully deleted."
#         But I should not see worker with name "TSF - INTERNATIONAL HEADQUARTERS" in the list
#
#    Scenario: Deleting country
#       Given I am on the page of worker which has "Langlade" as lastname
#        When I press "Delete"
#        Then I should be on the worker index page
#         And I should see "Worker has been successfully deleted."
#         But I should not see worker with name "Langlade" in the list

  @javascript
  Scenario: Accessing worker details via the list
       Given I am on the worker index page
        When I press details button near "Langlade"
        Then I should be on the page of worker which has "Langlade" as lastname
         And I should see "Arnaud Langlade" as "Name"

         And I should see "Developer" as "Function"
         And I should see "September 3, 1985" as "Birthday"
         And I should see "September 1, 2005" as "Arrived at"
         And I should see "-" as "Left at"
         And I should see "Dut" as "Diploma"
         And I should see "France" as "Based at"
         And I should see "64000 PAU" as "Address"
         And I should see "19, rue Jean-Baptiste Carreau" as "Address"
         And I should see "France" as "Address"
         And I should see "arnaud@gmail.fr" as "Emails"
         And I should see "arnaud@gmail.com" as "Emails"
         And I should see "phone : 0212457812" as "Phones"
         And I should see "fax : 0212415814" as "Phones"
         And I click "Contacts"
         And I should see "Didier Anglade" as "Name"
         And I should see "193, rue Cours du Médoc" as "Address"
         And I should see "33300 Bordeaux" as "Address"
         And I should see "France" as "Address"
         And I should see "didier@gmail.fr" as "Emails"
         And I should see "didier@gmail.com" as "Emails"
         And I should see "phone : 0512457812"
         And I should see "fax : 0512415814"