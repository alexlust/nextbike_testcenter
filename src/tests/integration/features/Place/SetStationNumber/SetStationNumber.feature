@place @place.setstationnumber
Feature: a developer can connect terminal ID to station number

  As an developer
  I want to connect terminal ID to station number

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to connect terminal ID to station number.
    Given The following valid user information
      | loginkey         | terminal_id | place |
      | AmyeQ9FTlUoEaRzx | 64434       | 27497 |
    When I try to connect terminal ID to station number

    Then the terminal ID will be connected to station number


