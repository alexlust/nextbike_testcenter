@bike @bike.cancelbooking
Feature: a user can cancel a running Booking

  As an user
  I want to cancel a running Booking

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a user, i want to cancel a running Booking.
    Given The following valid user information
      | loginkey         |
      | AmyeQ9FTlUoEaRzx |
    When I try to cancel a running Booking

    Then The running Booking will be canceled
