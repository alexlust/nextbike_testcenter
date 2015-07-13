@bike @bike.updatebike
Feature: a developer can update bike data

  As an developer
  I want to update bike data

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to update bike data.
    Given The following valid user information
      | loginkey         | bike  | lat              | lng              | comment | repair | missed | checked | campaign_id | place_id | code_changed | code_new |
      | AmyeQ9FTlUoEaRzx | 01131 | 51.5700000000001 | 7.05400000000002 | test    | 1      | 0      | 1       | 42          | 368843   | 1            | 1045     |
    When I try to update bike data

    Then the bike data will be updated


