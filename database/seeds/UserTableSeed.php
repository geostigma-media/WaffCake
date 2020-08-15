<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Diego',
        'lastname' => 'Vallejo',
        'email' => 'admin@admin.com',
        'password' => bcrypt('12345678'),
        'numIndentificate' => '456445646',
        'mobile' => 456445646,
        'roleId' => 1
      ]);

      User::create([
        'name' => 'Yovanny',
        'lastname' => 'Benavides',
        'email' => 'dyego@gmail.com',
        'password' => bcrypt('12345678'),
        'numIndentificate' => '456445646',
        'mobile' => 456445646,
        'roleId' => 2
      ]);


    }
}
