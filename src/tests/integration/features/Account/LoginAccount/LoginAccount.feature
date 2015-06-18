@account @account.loginAccount
Feature: a user can login to our System

  As an registrated user
  I want to be able to login to our System
  So i can rent a bike from the nextbike app or terminal

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |
    And A user with the following information
      | e_mail              | telefon_number | forename | name | pin    |
      | testAccount@test.de | generate_new   | Heinz    | Ratz | 112233 |

  Scenario: As a registrated person, i want to login to our app or terminal
    Given The following valid user information
      | e_mail              | telefon_number | pin    |
      | testAccount@test.de | generated      | 112233 |
    When I try to login
    Then The API Response will have the right login key


