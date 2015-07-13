@bike @bike.activebookings
Feature: a user can get all bookings informations of the last 7 days

  As an user
  I want to get all bookings informations of the last 7 days

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a user, i want to get all bookings informations of the last 7 days.
    Given The following valid user information
      | loginkey         |
      | AmyeQ9FTlUoEaRzx |
    When I try to get all bookings informations of the last 7 days

    Then I will get all bookings informations of the last 7 days
