@account @account.updateAccount
Feature: a user can update his account

  As an registered user
  I want to be able to update my account information
  So when i change my telefon number i can refresh my account.

  Background:
    Given the following base information
      | api-key |
      | 123123  |

  Scenario: As a registered person, i want to update my nextbike account.
    Given The following valid user information
      | e_mail              | telefon_number |
      | newAccount@test.de  | +49 1749237223 |
    When I try to update my Account with the given information

    Then The Account "newAccount@test.de" will be updated


