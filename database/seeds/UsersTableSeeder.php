<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'nama' => 'Ali Baba',
          'email' => 'ali@gmail.com',
          'no_kp' => '707070088888',
          'cawangan' => '1',
          'password' => bcrypt('abc123')
      ]);

      DB::table('users')->insert([
          'nama' => 'Ahmad',
          'email' => 'ahmad@gmail.com',
          'no_kp' => '709970088888',
          'cawangan' => '2',
          'password' => bcrypt('abc123')
      ]);

      DB::table('users')->insert([
          'nama' => 'Siti',
          'email' => 'siti@gmail.com',
          'no_kp' => '705570088888',
          'cawangan' => '1',
          'password' => bcrypt('abc123')
      ]);
    }
}
