<?php

namespace Tests\Aggregates;

use Admin\VirtualAccounts\Aggregates\AccountAggregateRoot;
use Admin\VirtualAccounts\Events\AccountCreated;
use Admin\VirtualAccounts\Events\AccountLimitHit;
use Admin\VirtualAccounts\Events\MoneyAdded;
use Admin\VirtualAccounts\Events\MoneySubtracted;
use Admin\VirtualAccounts\Events\TempMoneyAdded;
use Admin\VirtualAccounts\Exceptions\CouldNotSubtractMoney;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AccountAggregateRootTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function when_a_request_is_made_to_create_a_bank_account_it_is_created_successfully()
    {
        AccountAggregateRoot::fake()
            ->when(function (AccountAggregateRoot $accountAggregate) {
                $accountAggregate->createAccount(2,
                    3,
                    4,
                    1,
                    3,
                    'Kampala',
                    'Test bank Account',
                    4243243434352334,
                    'UGXKMPL',
                    1,
                    0,
                    1,
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'),
                    date('Y-m-d H:i:s'));
            })
            ->assertRecorded(new AccountCreated(
                2,
                3,
                4,
                1,
                3,
                'Kampala',
                'Test bank Account',
                4243243434352334,
                'UGXKMPL',
                1,
                0,
                1,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')));
    }

    /** @test */
    public function when_a_request_is_made_to_add_temporary_funds_to_an_account_it_is_successful()
    {
        AccountAggregateRoot::fake()
            ->given([new AccountCreated(
                2,
                3,
                4,
                1,
                3,
                'Kampala',
                'Test bank Account',
                4243243434352334,
                'UGXKMPL',
                1,
                0,
                1,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'))])
            ->when(function (AccountAggregateRoot $accountAggregate) {
                $accountAggregate->addTempMoney(500000);
            })
            ->assertRecorded(new TempMoneyAdded(500000));
    }

    /** @test */
    public function when_a_request_is_made_to_subtract_money_off_the_temporary_balance_it_is_successful()
    {
        AccountAggregateRoot::fake()
            ->given([new AccountCreated(
                2,
                3,
                4,
                1,
                3,
                'Kampala',
                'Test bank Account',
                4243243434352334,
                'UGXKMPL',
                1,
                0,
                1,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')),
                new TempMoneyAdded(51000)])
            ->when(function (AccountAggregateRoot $accountAggregate) {
                $accountAggregate->subtractMoney(1000);
            })
            ->assertRecorded(new MoneySubtracted(1000))
            ->assertNotRecorded(AccountLimitHit::class);
    }

//    /** @test */
    public function when_a_request_is_made_to_subtract_money_below_the_set_temporary_balance_it_is_not_successful()
    {
        AccountAggregateRoot::fake()
            ->given([new AccountCreated(
                2,
                3,
                4,
                1,
                3,
                'Kampala',
                'Test bank Account',
                4243243434352334,
                'UGXKMPL',
                1,
                0,
                1,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'))])
            ->when(function (AccountAggregateRoot $accountAggregate) {
                $accountAggregate->subtractMoney(1000);
            })
            ->assertNotRecorded(new MoneySubtracted(1000))
            ->assertRecorded(AccountLimitHit::class);
    }

    /** @test */
    public function when_a_request_is_made_to_add_money_to_an_account_it_is_successful()
    {
        AccountAggregateRoot::fake()
            ->given([new AccountCreated(
                2,
                3,
                4,
                1,
                3,
                'Kampala',
                'Test bank Account',
                4243243434352334,
                'UGXKMPL',
                1,
                0,
                1,
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')),
                new TempMoneyAdded(51000)])
            ->when(function (AccountAggregateRoot $accountAggregate) {
                $accountAggregate->addMoney(1000);
            })
            ->assertRecorded(new MoneyAdded(1000));
    }

}
