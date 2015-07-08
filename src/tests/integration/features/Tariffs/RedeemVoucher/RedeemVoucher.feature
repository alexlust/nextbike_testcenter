@tariffs @tariffs.redeemvoucher
Feature: a developer can redeem specified voucher

  As an developer
  I want to redeem specified voucher to specified user

  Background:
    Given the following base information
      | apikey           |
      | Em05hYN8BpmidRm7 |

  Scenario: As a developer, I redeem specified voucher to specified user
    When I try to redeem specified voucher to specified user
      | loginkey         | code   |
      | AmyeQ9FTlUoEaRzx | 281828 |
    Then I will get some information about the specified coupon and the voucher will be redeemed