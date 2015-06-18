@account @account.registerAccount
Feature: a user can registrate a new account

  As an unregistered user
  I want to be able to create a new account
  So i can rent a bike from the nextbike station

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to create a new nextbike account.
    Given The following valid user information
      | e_mail              | telefon_number | forename | name |
      | testAccount@test.de | generate_new   | Heinz    | Ratz |
    When I try to create a new Account with the given information

    Then The Account "testAccount@test.de" will be created


