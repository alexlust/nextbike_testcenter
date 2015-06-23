@tariffs @tariffs.tariffs
Feature: a user or developer can see all tariffs of a specified domain

  As an unregistered user
  I want to get all tariffs of a specified domain

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to get all tariffs of a specified domain
    When I try to get all tariffs of a specified domain
      | domain |
      | bu     |
    Then I will get all tariffs of a specified domain