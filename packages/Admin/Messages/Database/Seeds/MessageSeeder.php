<?php

namespace Admin\Messages\Database\Seeds;

use Admin\Messages\Models\MessageOutbox;
use Illuminate\Database\Seeder;
use Admin\Messages\Models\MessageInbox;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageInbox::truncate();
        MessageInbox::factory()->count(100)->create();

        MessageOutbox::truncate();
        MessageOutbox::factory()->count(100)->create();
    }
}
