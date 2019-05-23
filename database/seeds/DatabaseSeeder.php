<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employees;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      if (!User::where('email', 'admin@admin.com')->count()) {
         factory(User::class)->create();
      }

      factory(Employees::class, 10)->create();
    }
}
