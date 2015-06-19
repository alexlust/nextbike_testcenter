@bike @bike.getBikeState
Feature: a developer or device can check the bike state

  As an developer or device
  I want to be able to check the bike state
  So i can earn standart information about the bike

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |
    And A user with the following information
      | e_mail              | telefon_number | forename | name | pin    |
      | testAccount@test.de | generate_new   | Heinz    | Ratz | 112233 |

  Scenario: As a developer or device i want to check the bike state
    Given The following valid bike information
      | bikeNumber |
      | DOTENV     |
    When I try to get the state number with the given information
    Then I get the state from the bike with the given bike number


