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
        // DB::table('clients')->insert([
        //     'name' => 'Umum',
        //     'description' => 'Client umum',
        //     'email' => 'umum@gmail.com',
        //     'phone_number' => '081234567877',
        //     'instagram' => 'umumumum',
        //     'linkedin' => 'umumumum',
        //     'status' => 'in progress',
        //     'deadline' => '2022-04-15 03:17:24',
        //     'job_categories_id' => 1,
        // ]);

        DB::table('clients')->insert([
            'name' => 'Client 1',
            'description' => 'Client namanya Client 1 tapi aslinya bukan client 1 hehe',
            'email' => 'client1@gmail.com',
            'phone_number' => '08123898997877',
            'instagram' => 'client1111',
            'linkedin' => 'client1hehe',
            'status' => 'in progress',
            'deadline' => '2022-03-15 03:55:54',
            'job_categories_id' => 1,
        ]);

        DB::table('clients')->insert([
            'name' => 'Client 2',
            'description' => 'Client namanya Client 2 tapi aslinya memang client 2',
            'email' => 'client2@gmail.com',
            'phone_number' => '081234563337',
            'instagram' => 'client222',
            'linkedin' => 'clienttt222',
            'status' => 'in progress',
            'deadline' => '2022-02-16 11:12:27',
            'job_categories_id' => 1,
        ]);
    }
}
