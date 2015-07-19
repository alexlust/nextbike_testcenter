@tests @tests.addappmessageid
Feature: a developer can add app messageId to a given customer

  As an developer
  I want add app messageId to a given customer

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a developer, i want to can add app messageId to a given customer
    Given The following valid information
      | loginkey         | type    | message_id |
      | AmyeQ9FTlUoEaRzx | android | test       |
    When I try to add app messageId to a given customer
    Then Then the messageId will be added