@bike @bike.gpstracking
Feature: a developer can track a bike

  As an developer
  I want to track a bike

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to set bike RFID UID.
    Given The following valid user information
      | bike  | lat    | lng    | accuracy | comment          |
      | 89000 | 52.323 | 43.212 | 6        | Hier+wars+schoen |
    When I try to track a bike

    Then the bike will be tracked


