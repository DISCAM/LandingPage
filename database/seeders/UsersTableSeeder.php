<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Maciej',
            'email'=>'maciej@mail.com',
            'password'=>bcrypt('haslo'),
            'phone'=>'123456789',
            'address' => 'ulica ogrodowa',
            'status' => 'Active'
        ]);

        DB::table('users')->insert([
            'name' => 'Tomasz',
            'email' => 'tomasz@gmai.com',
            'password' => bcrypt('haslo'),
            'phone' => '345345345345',
            'address' => 'kusocinskiego',
            'status' => 'Active'

        ]);


        DB::table('users')->insert([
            'name' => 'Marcin',
            'email' => 'marcin@gmai.com',
            'password' => bcrypt('haslo'),
            'phone' => '345345345',
            'address' => 'lwowska',
            'status' => 'Active'

        ]);


    }
}
