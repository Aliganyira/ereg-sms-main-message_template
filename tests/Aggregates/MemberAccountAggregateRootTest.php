<?php

namespace Tests\Aggregates;

use Admin\VirtualAccounts\Aggregates\MemberAccountAggregateRoot;
use Admin\VirtualAccounts\Events\AccountLimitHit;
use Admin\VirtualAccounts\Events\MemberAccountCreated;
use Admin\VirtualAccounts\Events\MemberMoneyAdded;
use Admin\VirtualAccounts\Events\MemberMoneySubtracted;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MemberAccountAggregateRootTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function when_a_request_is_made_to_create_a_members_account_it_is_created_successfully()
    {
        MemberAccountAggregateRoot::fake()
            ->when(function (MemberAccountAggregateRoot $accountAggregateRoot) {
                $accountAggregateRoot->createAccount(
                    1,
                    'main',
                    'active',
                    12345677880,
                    0,
                    0
                );
            })
            ->assertRecorded(new MemberAccountCreated(1,
                'main',
                'active',
                12345677880,
                0,
                0));
    }

    /** @test */
    public function when_a_request_is_made_to_add_money_to_a_member_account_it_is_successful()
    {
        MemberAccountAggregateRoot::fake()
            ->given([new MemberAccountCreated(
                1,
                'main',
                'active',
                12345677880,
                0,
                0)])
            ->when(function (MemberAccountAggregateRoot $accountAggregate) {
                $accountAggregate->addMoney(1000);
            })
            ->assertRecorded(new MemberMoneyAdded(1000));
    }

    /** @test */
    public function when_a_request_is_made_to_subtract_money_on_a_member_account_it_is_successful()
    {
        MemberAccountAggregateRoot::fake()
            ->given([new MemberAccountCreated(
                1,
                'main',
                'active',
                12345677880,
                0,
                0),
                new MemberMoneyAdded(100000)])
            ->when(function (MemberAccountAggregateRoot $accountAggregate) {
                $accountAggregate->subtractMoney(1000);
            })
            ->assertRecorded(new MemberMoneySubtracted(1000))
            ->assertNotRecorded(AccountLimitHit::class);
    }
}
