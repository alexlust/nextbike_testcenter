@account @account.transfercredits
Feature: a user can transfer my credits to other customer acccount

  As an unregistered user
  I want to transfer my credits to other customer acccount

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, transfer my credits to other customer acccount.
    Given The following valid user information
      | loginkey         | currency | amount | mobile        | description |
      | JlOw1qAHlJdf0l70 | EUR      | 1000   | 4915773967465 | test        |
    When I try to transfer my credits to other customer acccount

    Then I will get confirmation with any data and the credits will be transfered


