<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create()->each(function($user){
            $user->books()->create(factory(\App\Book::class)->make()
            ->toArray())->categories()->attach([1,2]);
        });
    }
}
