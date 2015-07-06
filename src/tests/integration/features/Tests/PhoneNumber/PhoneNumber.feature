@tests @tests.phonenumber
Feature: a user or developer can check phone number for existence

  As an unregistered user
  I want check phone number for existence

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |

  Scenario: As a unregistered person, i want to check phone number for existence
    Given The following valid information
      | mobile |
      | 491631729531   |
    When I try to check a specified phone number for existence
    Then Then I will get data for existence of user with this phone number