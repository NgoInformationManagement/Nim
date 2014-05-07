@worker
Feature: Worker
    In order to create worker
    As a administrator
    I want to be able to manage worker

    Background:
        Given I am logged in as administrator
          And There are following workers:
             | gender  | firstname  | lastname | type      | agency | function  | arrivedAt  | birthday   | diploma | street                                 | postcode | city     | country |
             | male    | Arnaud     | Langlade | volunteer | France | Developer | 2005-09-01 | 1985-09-03 | Dut     | 19, rue Jean-Baptiste Carreau          | 64000    | PAU      | FR      |
             | male    | Sébastien  | Lannus   | employee  | Nica   | Admin Sys | 2005-09-01 | 1985-03-05 | Master  | Del supermercado Pali, 1 cuadra arriba |          | Managua  | NA      |
             | female  | Clémence   | Brig     | employee  | France | Bocs      | 2008-09-01 | 1985-08-08 | Licence | Cour de la martique                    | 33000    | Bordeaux | FR      |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following emails:
             | address          |
             | arnaud@gmail.fr  |
             | arnaud@gmail.com |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following phones:
             | type  | number     |
             | phone | 0212457812 |
             | fax   | 0212415814 |
          And Worker with firstname "Arnaud" and lastname "Langlade" has following contacts:
             | firstname  | lastname | street                                 | postcode | city     | country |
             | Didier     | Anglade  | 193, rue Cours du Médoc                | 33300    | Bordeaux | FR      |
             | Nina       | Poisson  | Del supermercado Pali, 1 cuadra arriba | 33300    | Bordeaux | FR      |
          And Contact with firstname "Didier" and lastname "Anglade" has following emails:
             | address          |
             | didier@gmail.fr  |
             | didier@gmail.com |
          And Contact with firstname "Didier" and lastname "Anglade" has following phones:
             | type  | number     |
             | phone | 0512457812 |
             | fax   | 0512415814 |
          And There are following mission:
            | title                   | description                        | country | startedAt  | endedAt    |
            | Earthquake in Indonesia | Earthquake in Indonesia in 2006    | IN      | 2006-06-01 | 2006-07-01 |
            | Earthquake in Pakistan  | Earthquake in Pakistan in 2005     | PA      | 2005-09-31 | 2006-10-01 |
            | Earthquake in Mexico    | Earthquake in Mexico in 2000       | ME      | 2000-10-01 | 2000-11-11 |
            | Earthquake in Iran      | Earthquake in Iran in 1989         | ME      | 1989-01-31 | 1989-02-11 |
          And There are following vaccine:
            | title   | description            |
            | Measles | Description of measles |
            | Rage    | Description of rage    |
            | Mumps   | Description of Mumps   |

  Scenario: Seeing empty index of worker
       Given There are no workers
        When I am on the worker index page
        Then I should see "There are no worker to display"

    Scenario: Seeing index of workers
       Given I am on the dashboard page
        When I follow "Workers"
        Then I should be on the worker index page
         And I should see 3 workers in the list

    Scenario: Accessing to the worker creation page
       Given I am on the dashboard page
        When I follow "Workers"
         And I follow "New worker"
        Then I should be on the worker creation page

    @javascript
    Scenario: Creating a new worker
       Given I am on the worker creation page
        When I fill in "Gender" with "Male"
         And I fill in "First name" with "Rémi"
         And I fill in "Last name" with "Anglade"
         And I fill in "Street" with "Langlade"
         And I fill in "Postcode" with "54000"
         And I fill in "City" with "City"
         And I select "France" from "Country"
         And I fill in "Birthday" with "03/03/1984"
         And I fill in "Function" with "Integrator"
         And I fill in "Arrived at" with "10/13/2010"
         And I fill in "Diploma" with "Dut"
         And I fill in "Street" with "19, rue Jean-Baptiste Carreau"
         And I fill in "Postcode" with "64000"
         And I fill in "City" with "PAU"
         And I select "France" from "Country"
         And I select "Intern" from "Type"
         And I add a new email to worker
         And I fill in "Address" in the item #1 of the "Emails" collection with "remi@email.fr"
         And I add a new phone to worker
         And I fill in "Type" in the item #1 of the "Phones" collection with "phone"
         And I fill in "Number" in the item #1 of the "Phones" collection with "05949838473"
         And I press "Create"
        Then I should be editing worker which has "Anglade" as lastname
         And I should see "Worker has been successfully created."
        When I follow "Contact persons"
         And I add a contact to worker
         And I fill in "First name" in the item #1 of the contact collection with "Didier"
         And I fill in "Last name" in the item #1 of the contact collection with "Anglade"
         And I fill in "Street" in the item #1 of the contact collection with "193, rue Cours du Médoc"
         And I fill in "Postcode" in the item #1 of the contact collection with "33000"
         And I fill in "City" in the item #1 of the contact collection with "Bordeaux"
         And I fill in "Country" in the item #1 of the contact collection with "France"
         And I add a new email to the #1 contact
         And I fill in email in the #1 contact with "didier@gmail.fr"
         And I add a new phone to the #1 contact
         And I fill in phone in the #1 contact with "phone" and "0512457812"
         And I click "Immigration"
         And I add a passport to worker
         And I fill in "Country" in the item #1 of the passports collection with "France"
         And I fill in "Number" in the item #1 of the passports collection with "432154RFD23F"
         And I fill in "Date of issue" in the item #1 of the passports collection with "02/11/2005"
         And I fill in "Date of expiry" in the item #1 of the passports collection with "02/11/2015"
         And I add a visa to worker
         And I fill in "Country" in the item #1 of the visa collection with "Niger"
         And I fill in "Started at" in the item #1 of the visa collection with "02/11/2005"
         And I fill in "Length" in the item #1 of the visa collection with "3"
         And I click "Missions accomplished"
         And I check "Earthquake in Indonesia"
         And I check "Earthquake in Mexico"
         And I click "Vaccines"
         And I check "Rage"
         And I check "Mumps"
         And I press "Update"
        Then I should be on the page of worker which has "Anglade" as lastname
         And I should see "Worker has been successfully updated."
         And I should see "Rémi Anglade" as "Name"
         And I should see "Integrator" as "Function"
         And I should see "March 3, 1984" as "Birthday"
         And I should see "October 13, 2010" as "Arrived at"
         And I should see "Intern" as "Type"
         And I should see "-" as "Left at"
         And I should see "Dut" as "Diploma"
         And I should see "France" as "Based at"
         And I should see "64000 PAU" as "Address"
         And I should see "19, rue Jean-Baptiste Carreau" as "Address"
         And I should see "France" as "Address"
         And I should see "remi@email.fr" as "Emails"
         And I should see "phone : 05949838473" as "Phones"
         And I click "Contact persons"
         And I should see "Didier Anglade" as "Name"
         And I should see "193, rue Cours du Médoc" as "Address"
         And I should see "33300 Bordeaux" as "Address"
         And I should see "France" as "Address"
         And I should see "didier@gmail.fr" as "Emails"
         And I should see "phone : 0512457812"
         And I click "Immigration"
         And I should see "France" as "Country"
         And I should see "432154RFD23F" as "Number"
         And I should see "February 11, 2005" as "Date of issue"
         And I should see "February 11, 2015" as "Date of expiry"
         And I should see "Niger" as "Country"
         And I should see "February 11, 2005" as "Started"
         And I should see "3" as "Length"
         And I click "Mission"
         And I should see "Earthquake in Indonesia"
         And I should see "Earthquake in Mexico"
         And I click "Vaccinations"
         And I should see "Rage"
         And I should see "Mumps"

  @javascript
    Scenario: Creating a new worker with empties or wrongs fields
      Given I am on the worker creation page
        And I leave "First name" empty
        And I leave "Last name" empty
        And I leave "Birthday" empty
        And I leave "Function" empty
        And I leave "Arrived at" empty
        And I press "Create"
       Then I should be on the worker creation page
        And I should see "First name" field error
        And I should see "Last name" field error
        And I should see "Birthday" field error
        And I should see "Function" field error
        And I should see "Arrived at" field error
        And I should see "You should define 1 phone or more"
       When I add a new email to worker
        And I fill in "Address" in the item #1 of the "Emails" collection with "wrongMail"
        And I add a new phone to worker
        And I press "Create"
       Then I should be on the worker creation page
        And I should see "Address" field error in the item #1 of the "Emails" collection
        And I should see "Number" field error in the item #1 of the "Phone" collection


    Scenario: Created worker appears in the list
       Given I created worker which has "Julien" "Dupont" as name
        When I go on the worker index page
        Then I should see 4 workers in the list
         And I should see worker with name "Dupont" in the list

    Scenario: Accessing the editing page from the list
        Given I am on the worker index page
         When I click edition button near "Langlade"
         Then I should be editing worker which has "Langlade" as lastname

    @javascript
    Scenario: Updating a worker
       Given I am updating the worker which has "Lannus" as lastname
        When I fill in "Gender" with "Male"
         And I fill in "First name" with "Rémi"
         And I fill in "Last name" with "Anglade"
         And I fill in "Street" with "Langlade"
         And I fill in "Postcode" with "54000"
         And I fill in "City" with "City"
         And I fill in "Birthday" with "03/03/1984"
         And I fill in "Function" with "Integrator"
         And I fill in "Arrived at" with "03/03/2005"
         And I select "Intern" from "Type"
         And I add a new email to worker
         And I fill in "Address" in the item #1 of the "Emails" collection with "remi@email.fr"
         And I add a new phone to worker
         And I fill in "Type" in the item #1 of the "Phones" collection with "fax"
         And I fill in "Number" in the item #1 of the "Phones" collection with "05949838473"
         And I click "Contact persons"
         And I add a contact to worker
         And I fill in "First name" in the item #1 of the contact collection with "Rémi"
         And I fill in "Last name" in the item #1 of the contact collection with "Anglade"
         And I add a new phone to the #1 contact
         And I fill in phone in the #1 contact with "phone" and "0556983423"
         And I click "Missions accomplished"
         And I check "Earthquake in Indonesia"
         And I check "Earthquake in Mexico"
         And I click "Immigration"
         And I add a passport to worker
         And I fill in "Country" in the item #1 of the passports collection with "Niger"
         And I fill in "Number" in the item #1 of the passports collection with "432154RFD23F"
         And I fill in "Date of issue" in the item #1 of the passports collection with "03/03/2005"
         And I fill in "Date of expiry" in the item #1 of the passports collection with "03/03/2015"
         And I add a visa to worker
         And I fill in "Country" in the item #1 of the visa collection with "Niger"
         And I fill in "Length" in the item #1 of the visa collection with "3"
         And I fill in "Started at" in the item #1 of the visa collection with "02/11/2005"
         And I click "Vaccinations"
         And I check "Rage"
         And I press "Update"
        Then I should be on the page of worker which has "Anglade" as lastname
         And I should see "Worker has been successfully updated."

    @javascript
    Scenario: Updating a worker's contact persons with empties or wrongs fields
       Given I am updating the worker which has "Lannus" as lastname
        When I press "Update"
         And I click "Contact persons"
        Then I should see "You should define 1 contact or more"
        When I add a contact to worker
         And I press "Update"
         And I click "Contact persons"
        Then I should see "First name" field error in the item #1 of the contact collection
         And I should see "Last name" field error in the item #1 of the contact collection
         And I should see "You should define 1 phone or more"

     @javascript
     Scenario: Updating a worker's passport with empties or wrongs fields
       Given I am updating the worker which has "Lannus" as lastname
        When I press "Update"
         And I click "Immigration"
        Then I should see "You should define 1 passport or more"
        When I add a passport to worker
         And I press "Update"
         And I click "Immigration"
        Then I should see "Number" field error in the item #1 of the passport collection
        Then I should see "Date of issue" field error in the item #1 of the passport collection
        Then I should see "Date of expiry" field error in the item #1 of the passport collection
        When I fill in "Date of issue" in the item #1 of the passports collection with "string"
         And I fill in "Date of expiry" in the item #1 of the passports collection with "string"
         And I press "Update"
        Then I should see "Date of issue" field error in the item #1 of the passport collection
        Then I should see "Date of expiry" field error in the item #1 of the passport collection

     @javascript
     Scenario: Updating a worker's visa with empties or wrongs fields
       Given I am updating the worker which has "Lannus" as lastname
        When I press "Update"
         And I click "Immigration"
         And I add a visa to worker
         And I press "Update"
         And I click "Immigration"
        Then I should see "Started at" field error in the item #1 of the visa collection
        Then I should see "Length" field error in the item #1 of the visa collection
        When I fill in "Length" in the item #1 of the visa collection with "string"
         And I fill in "Started at" in the item #1 of the visa collection with "string"
         And I press "Update"
        Then I should see "Length" field error in the item #1 of the visa collection
        Then I should see "Started at" field error in the item #1 of the visa collection

    @javascript
    Scenario: Deleting worker via the list button
       Given I am on the worker index page
        When I press deletion button near "Langlade"
         And I click "Delete" from the confirmation modal
        Then I should be on the worker index page
         And I should see "Worker has been successfully deleted."
         But I should not see worker with name "TSF - INTERNATIONAL HEADQUARTERS" in the list

    @javascript
    Scenario: Deleting worker
       Given I am on the page of worker which has "Langlade" as lastname
        When I press "Delete"
         And I click "Delete" from the confirmation modal
        Then I should be on the worker index page
         And I should see "Worker has been successfully deleted."
         But I should not see worker with name "Langlade" in the list

  @javascript
  Scenario: Accessing worker details via the list
       Given I am on the worker index page
        When I press details button near "Langlade"
         And I click "Contact persons"
         And I click "Immigration"
         And I click "Mission"