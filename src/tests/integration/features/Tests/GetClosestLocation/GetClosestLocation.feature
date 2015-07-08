@tests @tests.getclosestlocation
Feature: a user or developer can get the closest location

  As an unregistered user
  I want get the closest location

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to get the closest location
    Given The following valid information
      | lat     | lng     |
      | 34.6823 | 33.0464 |
    When I try to get the closest location
    Then I will get the closest location