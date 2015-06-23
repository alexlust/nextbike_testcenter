@bike @bike.rent
Feature: a user can login to our System

  As an registered user
  I want to be able to rent a bike
  So i can have a nice ride

  Background:
    Given the following base information
      | apikey           |
      | 7gFQfSaiKqHWY7bf |
    And A user with the following information
      | e_mail              | telefon_number | forename | name | pin    |
      | testAccount@test.de | generate_new   | Heinz    | Ratz | 112233 |

  Scenario: As a registered person, i want to rent a bike
    Given The following valid bike information
      | bikeNumber |
      | TestBike   |
    When I try to rent
    Then The API Response will have the right lock code

    Given The following valid return information
      | bikeNumber | placeId     |
      | TestBike   | TestStation |
    When I try to return
    Then The Bike will be returned




