@account @account.getonrfid
Feature: on request RFID_UID get customer card or bike chip

  As an unregistered user
  I want to get customer card or bike chip

  Background:
    Given the following base information
      | apikey           |
      | Em05hYN8BpmidRm7 |

  Scenario: As a unregistered person, i want to get customer card or bike chip.
    Given The following valid user information
      | rfid       |
      | 3105877777 |
    When I try to get customer card or bike chip

    Then I will get my account data


