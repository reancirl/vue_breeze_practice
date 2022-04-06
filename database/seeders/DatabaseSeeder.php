<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'first_name' => 'Bruce',
            'last_name' => 'Wayne',
            'email' => 'admin@admin.com',
            'mobile_number' => '+1 1234567',
            'address' => 'Gotham City',
            'password' => \Hash::make('password'),
        ]);

        \DB::table('products')->insert([
            'name' => 'Laravel',
            'Description' => 'PHP Framework',
            'quantity' => '10',
            'price' => '1000',
        ]);

        \DB::table('products')->insert([
            'name' => 'Vue JS',
            'Description' => 'JS Framework',
            'quantity' => '10',
            'price' => '1500',
        ]);

        \DB::table('orders')->insert([
            'product_id' => '1',
            'user_id' => '1',
            'price' => '1000',
        ]);

        \DB::table('orders')->insert([
            'product_id' => '2',
            'user_id' => '1',
            'price' => '1500',
        ]);
    }
}
