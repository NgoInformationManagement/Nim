@worker
Feature: Dashboard
  In order to have an overview of the latest update
  As a administrator
  I need to access to the dashboard

  Background:
    Given I am logged in as administrator
    And There are following workers:
      | gender  | firstname  | lastname | type      | agency | function   | arrivedAt  | birthday   | diploma | street                                 | postcode | city     | country |
      | male    | Arnaud     | Langlade | volunteer | France | Developer  | 2005-09-01 | 1985-09-03 | Dut     | 19, rue Jean-Baptiste Carreau          | 64000    | PAU      | FR      |
      | male    | Sébastien  | Lannus   | employee  | Nica   | Admin Sys  | 2005-09-01 | 1985-03-05 | Master  | Del supermercado Pali, 1 cuadra arriba |          | Managua  | NA      |
      | female  | Clémence   | Brig     | employee  | France | Boss       | 2008-09-01 | 1985-08-08 | Licence | 19, rue Charles de Gaules              | 33000    | Bordeaux | FR      |
      | female  | Monique    | Petit    | employee  | France | President  | 2008-09-01 | 1985-08-08 | Licence | 19, rue Martinique                     | 33000    | Bordeaux | FR      |
      | female  | Clémence   | Durant   | employee  | France | Developper | 2008-09-01 | 1985-08-08 | Licence | 19, Cour du médoc                      | 33000    | Bordeaux | FR      |
      | male    | Benoit     | Dupont   | employee  | France | Admin      | 2008-09-01 | 1985-08-08 | Licence | 19, rue Maurice                        | 33000    | Bordeaux | FR      |

    And There are following mission:
      | title                   | description                   | country | startedAt  | endedAt    |
      | Earthquake in Indonesia | Earthquake in Indonesia, 2006 | ID      | 2006-06-01 | 2006-07-01 |
      | Earthquake in Pakistan  | Earthquake in Pakistan, 2005  | PK      | 2005-09-31 | 2006-10-01 |
      | Earthquake in Mexico    | Earthquake in Mexico, 2000    | MX      | 2000-10-01 | 2000-11-11 |
      | Earthquake in Iran      | Earthquake in Iran, 1989      | IR      | 1989-01-31 | 1989-02-11 |
      | Earthquake in Perou     | Earthquake in Perou, 1989     | PE      | 1939-01-31 | 1939-02-11 |
      | Earthquake in Niger     | Earthquake in Niger, 1989     | NE      | 1949-01-31 | 1949-02-11 |

  Scenario: Seeing the last workers and mission updated
    Given I am on the dashboard page
     Then I should see 5 workers in the list
      And I should see 5 missions in the list