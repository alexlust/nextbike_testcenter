@tests @tests.getterminalinfo
Feature: a developer can get information of a given terminal

  As an developer
  I want to get information of a given terminal

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a developer, i want to get get information of a given terminal
    Given The following valid information
      | terminal_id |
      | 107538      |
    When I try to get information of a given terminal
    Then I will get information of a given terminal