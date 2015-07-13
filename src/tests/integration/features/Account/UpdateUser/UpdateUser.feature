@account @account.updateuser
Feature: a user can update his account

  As an registered user
  I want to be able to change my account
  So i can change my personal information

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a registered person, i want to update my nextbike account
    When I try to change my account with the following information
      | loginkey         | mobile        | email            | zip   | forename  | name | address      | city    | language | payment | country | iban   | bic     | newsletter |
      | AmyeQ9FTlUoEaRzx | 4915773967465 | lust@nextbike.de | 01477 | Alexander | Lust | Teststraße+2 | Leipzig | de       | cc      | de      | 123321 | 3254876 | false      |
    Then The API Response will have the rlust@nextbike.deight updated user information