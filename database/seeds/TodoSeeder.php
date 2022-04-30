<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'name' => 'AAA',
            'description' => 'aaaaa',
            'deadline' => '2022-04-16 03:17:21',
            'done' => 0,
            'clients_id' => 2
        ]);
    }
}
