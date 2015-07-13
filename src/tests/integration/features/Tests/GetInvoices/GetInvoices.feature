@tests @tests.getinvoices
Feature: a developer can get invoices of a given user

  As an developer
  I want to get invoices of a given user

  Background:
    Given the following base information
      | apikey           |
      | EmO5hYN8BpmidRm7 |

  Scenario: As a developer, i want to get invoices of a given user
    Given The following valid information
      | loginkey     |
      | 33F6Tp6cCXxnLDNE |
    When I try to get invoices of a given user
    Then I will get invoices of a given user