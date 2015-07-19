@place @place.setrackids
Feature: a developer can set rack_ids

  As an developer
  I want to set rack_ids

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to set rack_ids.
    Given The following valid user information
      | rack_ids | terminal_id | place_id |
      | 879      | 85048       | 66097    |
    When I try to set rack_ids

    Then the rack_ids will be set