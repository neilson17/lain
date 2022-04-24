<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Umum',
            'description' => 'Client umum',
            'email' => 'umum@gmail.com',
            'phone_number' => '081234567877',
            'instagram' => 'umumumum',
            'linkedin' => 'umumumum',
            'status' => 'in progress',
            'deadline' => '2022-04-15 03:17:24',
            'job_categories_id' => 1,
        ]);
    }
}
