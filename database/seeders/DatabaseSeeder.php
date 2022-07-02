<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\academic_infos::factory(100)->create();
        \App\Models\announcements::factory(100)->create();
        \App\Models\applications::factory(100)->create();
        \App\Models\appointment_category::factory(100)->create();
        \App\Models\appointments::factory(100)->create();
        \App\Models\categories::factory(100)->create();
        \App\Models\chat_rooms::factory(100)->create();
        \App\Models\chats::factory(100)->create();
        \App\Models\contact_infos::factory(100)->create();
        \App\Models\guidances::factory(100)->create();
        \App\Models\instructors::factory(100)->create();
        \App\Models\new_features::factory(100)->create();
        \App\Models\other_infos::factory(100)->create();
    }
}
