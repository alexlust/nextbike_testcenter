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
      | loginkey         | rfid       | bike  | terminal_id | boardcomputer | snap | boardcomputer_version |
      | AmyeQ9FTlUoEaRzx | 3105899999 | 89000 | 85048       | 1033          | 1234 | 0d050f55              |
    When I try to set bike RFID UID

    Then the bike RFID UID will be set


