@account @account.setcustomerrfiduid
Feature: a developer can set customer RFID UID

  As an developer
  I want to set customer RFID UID

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to set customer RFID UID.
    Given The following valid user information
      | loginkey         | rfid       |
      | AmyeQ9FTlUoEaRzx | 3105877777 |
    When I try to set customer RFID UID

    Then the customer RFID UID will be set


