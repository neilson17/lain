<?php

use Illuminate\Database\Seeder;

class TodoTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_tags')->insert([
            'name' => 'Tag 1'
        ]);

        DB::table('todo_tags')->insert([
            'name' => 'Tag 2'
        ]);

        DB::table('todo_tags')->insert([
            'name' => 'Tag 3'
        ]);

        DB::table('todo_tags')->insert([
            'name' => 'Tag 4'
        ]);

        DB::table('todo_tags')->insert([
            'name' => 'Tag 5'
        ]);
    }
}
