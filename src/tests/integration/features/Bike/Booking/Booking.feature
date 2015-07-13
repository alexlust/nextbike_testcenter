@bike @bike.booking
Feature: a user can book a defined numbers of bikes on a defined place

  As an user
  I want to book a defined numbers of bikes on a defined place

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a user, i want to book a defined numbers of bikes on a defined place.
    Given The following valid user information
      | loginkey         | start_time     | end_time     | num_bikes | place | biketypes |
      | AmyeQ9FTlUoEaRzx | set_start_time | set_end_time | 1         | 94    |           |
    When I try to book a defined numbers of bikes on a defined place

    Then the defined numbers of bikes will be booked
