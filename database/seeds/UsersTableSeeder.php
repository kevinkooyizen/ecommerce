<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('users')->insert([
        'name' => 'Developer',
        'email' => 'system@admin.com',
        'password' => bcrypt('123456'),
        'admin' => true,
      ]);
    }
}
