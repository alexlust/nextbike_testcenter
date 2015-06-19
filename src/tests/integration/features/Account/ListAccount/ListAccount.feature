@account @account.listAccount
Feature: a developer or device can receive the account information

  As an developer or device
  I want to be able to receive account information
  So i can earn an overview from a account

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |
    And A user with the following information
      | e_mail              | telefon_number | forename | name | pin    |
      | testAccount@test.de | generate_new   | Heinz    | Ratz | 112233 |

  Scenario: As a developer or device i want to receive account information
    Given The stored loginkey
    When I try to receive the user information
    Then The API Response will have the right user information


