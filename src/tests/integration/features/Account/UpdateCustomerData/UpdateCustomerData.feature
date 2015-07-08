@account @account.updateCustomerData
Feature: a user can update his account

  As an registered user
  I want to be able to change my account
  So i can change my personal information

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |
    And A user with the following information
      | e_mail              | telefon_number | forename | name | pin    |
      | testAccount@test.de | generate_new   | Heinz    | Ratz | 112233 |

  Scenario: As a registered person, i want to update my nextbike account
    Given The stored loginkey
    When I try to change my account with the following information
      | mobile       | zip   | address          | city    | bank_code | language | newsletter | country |
      | 491631729531 | 01477 | Thomasiusstr. 18 | Leipzig | 76360033  | ar       | true       | de      |
    Then The API Response will have the right updated user information