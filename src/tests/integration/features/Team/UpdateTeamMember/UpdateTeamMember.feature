@team @team.updateteammember
Feature: a developer can update a given team member

  As an developer
  I want to update team member

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a developer, i want to update team member.
    Given The following valid user information
      | loginkey         | mobile         | ticket |
      | AmyeQ9FTlUoEaRzx | 49175922941474 | 1      |
    When I try to update a given team member

    Then the terminal ID will be updated
