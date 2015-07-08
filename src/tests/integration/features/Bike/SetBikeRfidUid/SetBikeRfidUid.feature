@bike @bike.setbikerfiduid
Feature: a developer can set bike FID UID

  As an developer
  I want to set bike RFID UID

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to set bike RFID UID.
    Given The following valid user information
      | loginkey         | rfid       |bike|
      | AmyeQ9FTlUoEaRzx | 3105899999 |1000|
    When I try to set bike RFID UID

    Then the bike RFID UID will be set


