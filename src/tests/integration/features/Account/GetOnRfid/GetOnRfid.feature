@account @account.resetpin
Feature: a user can reset his pin

  As an unregistered user
  I want to reset my pin

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to reset my pin.
    Given The following valid user information
      | mobile |
      | 4915773967465   |
    When I try to to reset my pin

    Then I will get  my account data and a sms with new pin


