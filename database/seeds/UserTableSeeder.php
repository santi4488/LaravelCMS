<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
          [
            'name' => 'Bill',
            'email' => 'bill@crm.app',
            'password' => bcrypt('secret'),
          ],
          [
            'name' => 'Mary',
            'email' => 'mary@crm.app',
            'password' => bcrypt('secret'),
          ],
        ]);
    }
}
