@bike @bike.getbikerfiduid
Feature: a developer can get bike chip with given FID UID

  As an developer
  I want to get bike RFID UID

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to get bike chip with given FID UID.
    Given The following valid user information
      | rfid       |
      | 3105811111 |
    When I try to get bike chip with given FID UID

    Then I will get the bike chip with given RFID UID


