@tariffs @tariffs.singletariffbycode
Feature: a user or developer can see a tariff of specified code

  As an unregistered user
  I want to get a tariff of specified code

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to get a tariff of specified code
    When I try to get one tariff of a specified code
      | code   |
      | 590959 |
    Then I will get one tariff of a specified code