@tariffs @tariffs.singletariff
Feature: a user or developer can see a tariff of specified uid

  As an unregistered user
  I want to get a tariff of specified uid

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to get a tariff of specified uid
    When I try to get one tariff of a specified uid
      | uid  |
      | 1090 |
    Then I will get one tariff of a specified uid