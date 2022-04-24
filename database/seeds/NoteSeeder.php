<?php

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('notes')->insert([
        //     'title' => 'Note pertama',
        //     'content' => 'ini isi note pertama',
        //     'date' => '2022-04-16 03:17:21',
        //     'type' => 'public',
        //     'clients_id' => 1,
        //     'users_username' => 'admin',
        // ]);

        // DB::table('notes')->insert([
        //     'title' => 'Note kedua',
        //     'content' => 'ini isi note kedua',
        //     'date' => '2022-04-16 03:18:22',
        //     'type' => 'public',
        //     'clients_id' => 1,
        //     'users_username' => 'admin',
        // ]);

        // DB::table('notes')->insert([
        //     'title' => 'Note ketiga',
        //     'content' => 'ini isi note ketiga',
        //     'date' => '2022-04-16 03:17:23',
        //     'type' => 'public',
        //     'clients_id' => 1,
        //     'users_username' => 'admin',
        // ]);

        // DB::table('notes')->insert([
        //     'title' => 'Note keempat',
        //     'content' => 'ini isi note keempat',
        //     'date' => '2022-04-16 03:17:24',
        //     'type' => 'public',
        //     'clients_id' => 1,
        //     'users_username' => 'admin',
        // ]);

        DB::table('notes')->insert([
            'title' => 'Note kelima',
            'content' => 'ini isi note kelima',
            'date' => '2022-04-16 03:17:25',
            'type' => 'private',
            'clients_id' => 1,
            'users_username' => 'admin',
        ]);

        DB::table('notes')->insert([
            'title' => 'Note keenam',
            'content' => 'ini isi note keenam',
            'date' => '2022-04-16 03:17:26',
            'type' => 'private',
            'clients_id' => 1,
            'users_username' => 'admin',
        ]);
    }
}
