<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RoleTableSeeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Roles::create([
        'name'=>'admin'
      ]);
      Roles::create([
        'name'=>'client'
      ]);
      Roles::create([
        'name'=>'especialClient'
      ]);
    }
}
