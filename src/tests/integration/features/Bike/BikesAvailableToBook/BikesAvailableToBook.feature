@bike @bike.bikesavailabletoBook
Feature: a user can get a list of available bikes on a defined place

  As an user
  I want to get a list of available bikes on a defined place

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a user, i want to Get a list of available bikes on a defined place.
    Given The following valid user information
      | loginkey         | start_time     | end_time     | num_bikes | place | biketypes |
      | AmyeQ9FTlUoEaRzx | set_start_time | set_end_time | 4         | 94    |           |
    When I try to get a list of available bikes on a defined place

    Then I Ggt a list of available bikes on a defined place