Feature: Agency
    In order to create agency
    As a store administrator
    I want to be able to manage agency

    Background:
        Given I am logged in as administrator
          And There are following agencies:
             | name                             | street                                 | postcode | city    | country | phoneNumber | fax         | email          |
             | TSF - INTERNATIONAL HEADQUARTERS | 19, rue Jean-Baptiste Carreau          | 64000    | PAU     | FR      | 0559844360  | 0559844358  | email@email.fr |
             | TSF - LATIN AMERICA              | Del supermercado Pali, 1 cuadra arriba |          | Managua | NA      | 50522774843 | 50522774843 | email@email.fr |
             | TSF - ASIA                       | 71 Phayathai Rd, Ratchathewi           | 10400    | Bangkok | TH      | 0845392103  |             | email@email.fr |

    Scenario: Seeing empty index of agency
       Given There are no agencies
        When I am on the agency index page
        Then I should see "There are no agency to display"

    Scenario: Seeing index of agencies
       Given I am on the dashboard page
        When I follow "Agencies"
        Then I should be on the agency index page
         And I should see 3 agencies in the list

    Scenario: Accessing to the agency creation page
       Given I am on the dashboard page
        When I follow "Agencies"
         And I follow "New Agency"
        Then I should be on the agency creation page

    @javascript
    Scenario: Creating a new agency
       Given I am on the agency creation page
        When I fill in "Name" with "New agency"
         And I fill in "Street" with "Street"
         And I fill in "Postcode" with "54000"
         And I fill in "City" with "City"
         And I fill in "Country" with "FR"
         And I fill in "Phone Number" with "0559595959"
         And I fill in "Fax" with "0559595951"
         And I fill in "Email" with "email@email.fr"
         And I press "Create"
        Then I should be on the page of agency which has "New agency" as name
         And I should see "Agency has been successfully created."

    @javascript
    Scenario: Creating a new agency with empties or wrongs fields
      Given I am on the agency creation page
       When I leave "Name" empty
        And I leave "Street" empty
        And I leave "Postcode" empty
        And I leave "Country" empty
        And I leave "Phone Number" empty
        And I leave "Fax" empty
        And I fill in "Email" with "wrong@mail.fr"
        And I press "Create"
       Then I should be on the agency creation page
        And I should see "Name" field error
        And I should see "Email" field error

    Scenario: Created agency appears in the list
       Given I created agency "New agency"
        When I go on the agency index page
        Then I should see 4 agencies in the list
         And I should see agency with name "New agency" in the list

    Scenario: Accessing the editing page from the list
        Given I am on the agency index page
         When I click edition button near "TSF - INTERNATIONAL HEADQUARTERS"
         Then I should be editing agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name

    @javascript
    Scenario: Updating a agency
       Given I am updating the agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name
        When I fill in "Name" with "New agency"
         And I fill in "Street" with "Street"
         And I fill in "Postcode" with "54000"
         And I fill in "City" with "City"
         And I fill in "Country" with "FR"
         And I fill in "Phone Number" with "0559595959"
         And I fill in "Fax" with "0559595951"
         And I fill in "Email" with "email@email.fr"
         And I press "Update"
        Then I should be on the page of agency which has "New agency" as name
         And I should see "Agency has been successfully updated."

    @javascript
    Scenario: Updating a agency with empties or wrongs fields
       Given I am updating the agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name
        When I leave "Name" empty
         And I leave "Street" empty
         And I leave "Postcode" empty
         And I leave "Country" empty
         And I leave "Phone Number" empty
         And I leave "Fax" empty
         And I fill in "Email" with "wrong@mail.fr"
         And I press "Update"
        Then I should be editing agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name
         And I should see "Name" field error
         And I should see "Email" field error

    Scenario: Deleting agency via the list button
       Given I am on the agency index page
        When I press deletion button near "TSF - INTERNATIONAL HEADQUARTERS"
        Then I should still be on the agency index page
         And I should see "Agency has been successfully deleted."
         But I should not see agency with name "TSF - INTERNATIONAL HEADQUARTERS" in the list

    Scenario: Deleting country
       Given I am on the page of agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name
        When I press "Delete"
        Then I should be on the agency index page
         And I should see "Agency has been successfully deleted."
         But I should not see agency with name "TSF - INTERNATIONAL HEADQUARTERS" in the list

    Scenario: Accessing agency details via the list
       Given I am on the agency index page
        When I press details button near "TSF - INTERNATIONAL HEADQUARTERS"
        Then I should be on the page of agency which has "TSF - INTERNATIONAL HEADQUARTERS" as name
         And I should see "TSF - INTERNATIONAL HEADQUARTERS"
         And I should see "19, rue Jean-Baptiste Carreau"
         And I should see "64000"
         And I should see "PAU"
         And I should see "France"
         And I should see "0559844360"
         And I should see "0559844358"
         And I should see "email@email.fr"