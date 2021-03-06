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
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(InboxSeeder::class);
        $this->call(AboutUseSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(CategotySeeder::class);

    }
}
