@account @account.createAccount
Feature: a user can create a new account

  As an unregistered user
  I want to be able to create a new account
  So i can rent a bike from the nextbike station

  Background:
    Given the following base information
      | api-key |
      | 123123  |

  Scenario: As a unregistered person, i want to create a new nextbike account.
    Given The following valid user information
      | e_mail              | telefon_number |
      | testAccount@test.de | +49 1749237223 |
    When I try to create a new Account with the given information

    Then The Account "testAccount@test.de" will be created


