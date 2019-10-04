<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [];

        $roles[] = ['name' => 'Admin'];
        $roles[] = ['name' => 'Manager'];
        $roles[] = ['name' => 'User'];

        \DB::table('roles')->insert($roles);
    }
}
