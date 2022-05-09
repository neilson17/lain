<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Accounts')->insert([
            'username' => 'admin',
            'name' => 'admin',
            'password' => 'admin',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'active' => 1,
            'phone_number' => '081234567899',
            'line' => 'adminadmin',
            'instagram' => 'admin123',
            'linkedin' => 'adminadminn',
            'address' => 'Jl. Admin no 123'
        ]);
    }
}
